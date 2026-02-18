<?php
/**
 * LieferMax Contact Form Handler
 * 
 * GDPR-compliant contact form processor for Strato hosting
 * Sends emails to info@liefermax.com
 * 
 * Security features:
 * - Input sanitization and validation
 * - Honeypot spam protection
 * - Rate limiting (basic)
 * - XSS prevention
 */

// Start session for rate limiting
session_start();

// Configuration
define('RECIPIENT_EMAIL', 'info@hiplus.de');
define('SUBJECT_PREFIX', '[LieferMax Kontakt] ');
define('RATE_LIMIT_SECONDS', 60); // 1 minute between submissions

define('LOG_FILE_PATH', __DIR__ . '/contact-form.log');

// Response headers
header('Content-Type: application/json; charset=utf-8');

function writeLog($event, $data = []) {
    $payload = [
        'ts' => date('c'),
        'event' => $event,
        'ip' => isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : null,
        'data' => $data,
    ];

    error_log(json_encode($payload, JSON_UNESCAPED_UNICODE) . "\n", 3, LOG_FILE_PATH);
}

// Only allow POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    writeLog('method_not_allowed', ['method' => isset($_SERVER['REQUEST_METHOD']) ? $_SERVER['REQUEST_METHOD'] : null]);
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Methode nicht erlaubt.']);
    exit;
}

/**
 * Rate limiting check
 */
function checkRateLimit() {
    if (isset($_SESSION['last_submission'])) {
        $timeSinceLastSubmission = time() - $_SESSION['last_submission'];
        if ($timeSinceLastSubmission < RATE_LIMIT_SECONDS) {
            return false;
        }
    }
    return true;
}

/**
 * Sanitize input data
 */
function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
    return $data;
}

/**
 * Validate email address
 */
function validateEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

/**
 * Validate required fields
 */
function validateFields($data) {
    $errors = [];
    
    // Name validation
    if (empty($data['name']) || strlen($data['name']) < 2) {
        $errors[] = 'Bitte geben Sie Ihren Namen ein (mindestens 2 Zeichen).';
    }
    
    // Email validation
    if (empty($data['email'])) {
        $errors[] = 'Bitte geben Sie Ihre E-Mail-Adresse ein.';
    } elseif (!validateEmail($data['email'])) {
        $errors[] = 'Bitte geben Sie eine gültige E-Mail-Adresse ein.';
    }
    
    // Message validation
    if (empty($data['message']) || strlen($data['message']) < 10) {
        $errors[] = 'Bitte geben Sie eine Nachricht ein (mindestens 10 Zeichen).';
    }
    
    return $errors;
}

// Check rate limit
if (!checkRateLimit()) {
    writeLog('rate_limited');
    http_response_code(429);
    echo json_encode([
        'success' => false, 
        'message' => 'Bitte warten Sie eine Minute, bevor Sie eine weitere Nachricht senden.'
    ]);
    exit;
}

// Get and sanitize POST data
$name = isset($_POST['name']) ? sanitizeInput($_POST['name']) : '';
$email = isset($_POST['email']) ? sanitizeInput($_POST['email']) : '';
$phone = isset($_POST['phone']) ? sanitizeInput($_POST['phone']) : '';
$company = isset($_POST['company']) ? sanitizeInput($_POST['company']) : '';
$subjectFromForm = isset($_POST['subject']) ? sanitizeInput($_POST['subject']) : '';
$message = isset($_POST['message']) ? sanitizeInput($_POST['message']) : '';

// Honeypot field (should be empty)
$honeypot = isset($_POST['website']) ? $_POST['website'] : '';

// Check honeypot
if (!empty($honeypot)) {
    writeLog('honeypot_triggered');
    // Spam detected - pretend success but don't send email
    http_response_code(200);
    echo json_encode([
        'success' => true, 
        'message' => 'Vielen Dank für Ihre Nachricht!'
    ]);
    exit;
}

// Validate fields
$errors = validateFields([
    'name' => $name,
    'email' => $email,
    'message' => $message
]);

if (!empty($errors)) {
    writeLog('validation_failed', ['errors' => $errors]);
    http_response_code(400);
    echo json_encode([
        'success' => false,
        'message' => 'Bitte überprüfen Sie Ihre Eingaben.',
        'errors' => $errors
    ]);
    exit;
}

// Prepare email
$subjectSuffix = !empty($subjectFromForm) ? (' - ' . $subjectFromForm) : '';
$subject = SUBJECT_PREFIX . 'Neue Kontaktanfrage von ' . $name . $subjectSuffix;

// Email body
$emailBody = "Neue Kontaktanfrage über liefermax.com\n\n";
$emailBody .= "----------------------------------------\n";
$emailBody .= "Name: " . $name . "\n";
$emailBody .= "E-Mail: " . $email . "\n";
if (!empty($subjectFromForm)) {
    $emailBody .= "Betreff: " . $subjectFromForm . "\n";
}
if (!empty($phone)) {
    $emailBody .= "Telefon: " . $phone . "\n";
}
if (!empty($company)) {
    $emailBody .= "Firma: " . $company . "\n";
}
$emailBody .= "----------------------------------------\n\n";
$emailBody .= "Nachricht:\n" . $message . "\n\n";
$emailBody .= "----------------------------------------\n";
$emailBody .= "Gesendet am: " . date('d.m.Y H:i:s') . "\n";
$emailBody .= "IP-Adresse: " . $_SERVER['REMOTE_ADDR'] . "\n";

// Email headers - Strato-compatible
// Note: Strato requires From address to be from the same domain
$headers = [];
$headers[] = 'From: kontakt@liefermax.com';
$headers[] = 'Reply-To: ' . $email;
$headers[] = 'X-Mailer: PHP/' . phpversion();
$headers[] = 'Content-Type: text/plain; charset=UTF-8';

// Send email
$mailSent = mail(RECIPIENT_EMAIL, $subject, $emailBody, implode("\r\n", $headers));

if ($mailSent) {
    writeLog('mail_sent', ['to' => RECIPIENT_EMAIL, 'subject' => $subject]);
    // Update rate limit timestamp
    $_SESSION['last_submission'] = time();
    
    // Success response
    http_response_code(200);
    echo json_encode([
        'success' => true,
        'message' => 'Vielen Dank für Ihre Nachricht! Wir werden uns schnellstmöglich bei Ihnen melden.'
    ]);
} else {
    writeLog('mail_failed', ['to' => RECIPIENT_EMAIL, 'subject' => $subject]);
    // Error sending email
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => 'Entschuldigung, beim Senden Ihrer Nachricht ist ein Fehler aufgetreten. Bitte versuchen Sie es später erneut oder kontaktieren Sie uns direkt per E-Mail.'
    ]);
}
?>
