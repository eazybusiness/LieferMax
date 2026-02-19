<?php
/**
 * LieferMax Content Editor Handler
 * 
 * Handles:
 * - Loading page content
 * - Saving page content
 * - Image upload/management
 * - Security and validation
 */

// Configuration
define('UPLOAD_DIR', __DIR__ . '/../images/user-uploads/');
define('ALLOWED_EXTENSIONS', ['jpg', 'jpeg', 'png', 'gif', 'webp']);
define('MAX_FILE_SIZE', 2 * 1024 * 1024); // 2MB
define('PAGES_DIR', __DIR__ . '/../../');

// Response headers
header('Content-Type: application/json; charset=utf-8');

// Only allow POST requests for modifications
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !isset($_GET['action'])) {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Methode nicht erlaubt.']);
    exit;
}

// Get action
$action = isset($_GET['action']) ? $_GET['action'] : (isset($_POST['action']) ? $_POST['action'] : '');

// Create upload directory if it doesn't exist
if (!file_exists(UPLOAD_DIR)) {
    mkdir(UPLOAD_DIR, 0755, true);
}

// Handle different actions
switch ($action) {
    case 'load':
        handleLoad();
        break;
        
    case 'save':
        handleSave();
        break;
        
    case 'upload':
        handleUpload();
        break;
        
    case 'list-images':
        handleListImages();
        break;
        
    case 'delete-image':
        handleDeleteImage();
        break;
        
    default:
        http_response_code(400);
        echo json_encode(['success' => false, 'message' => 'Ungültige Aktion.']);
        break;
}

/**
 * Load page content
 */
function handleLoad() {
    $page = isset($_GET['page']) ? $_GET['page'] : '';
    
    if (empty($page)) {
        echo json_encode(['success' => false, 'message' => 'Keine Seite angegeben.']);
        return;
    }
    
    // Validate page name
    if (!preg_match('/^[a-zA-Z0-9\-_\.]+$/', $page)) {
        echo json_encode(['success' => false, 'message' => 'Ungültiger Seitenname.']);
        return;
    }
    
    $filePath = PAGES_DIR . $page;
    
    if (!file_exists($filePath)) {
        echo json_encode(['success' => false, 'message' => 'Seite nicht gefunden.']);
        return;
    }
    
    $content = file_get_contents($filePath);
    
    if ($content === false) {
        echo json_encode(['success' => false, 'message' => 'Fehler beim Lesen der Datei.']);
        return;
    }
    
    echo json_encode(['success' => true, 'content' => $content]);
}

/**
 * Save page content
 */
function handleSave() {
    $page = isset($_POST['page']) ? $_POST['page'] : '';
    $content = isset($_POST['content']) ? $_POST['content'] : '';
    
    if (empty($page)) {
        echo json_encode(['success' => false, 'message' => 'Keine Seite angegeben.']);
        return;
    }
    
    // Validate page name
    if (!preg_match('/^[a-zA-Z0-9\-_\.]+$/', $page)) {
        echo json_encode(['success' => false, 'message' => 'Ungültiger Seitenname.']);
        return;
    }
    
    $filePath = PAGES_DIR . $page;
    
    if (!file_exists($filePath)) {
        echo json_encode(['success' => false, 'message' => 'Seite nicht gefunden.']);
        return;
    }
    
    // Create backup before saving
    $backupPath = $filePath . '.backup.' . date('Y-m-d_H-i-s');
    if (!copy($filePath, $backupPath)) {
        error_log('Failed to create backup: ' . $backupPath);
    }
    
    // Save content
    if (file_put_contents($filePath, $content) === false) {
        echo json_encode(['success' => false, 'message' => 'Fehler beim Speichern.']);
        return;
    }
    
    echo json_encode(['success' => true, 'message' => 'Inhalt gespeichert.']);
}

/**
 * Handle image upload
 */
function handleUpload() {
    if (!isset($_FILES['image'])) {
        echo json_encode(['success' => false, 'message' => 'Keine Datei hochgeladen.']);
        return;
    }
    
    $file = $_FILES['image'];
    
    // Validate file
    if ($file['error'] !== UPLOAD_ERR_OK) {
        $errorMessages = [
            UPLOAD_ERR_INI_SIZE => 'Datei ist zu groß.',
            UPLOAD_ERR_FORM_SIZE => 'Datei ist zu groß.',
            UPLOAD_ERR_PARTIAL => 'Datei wurde nur teilweise hochgeladen.',
            UPLOAD_ERR_NO_FILE => 'Keine Datei hochgeladen.',
            UPLOAD_ERR_NO_TMP_DIR => 'Kein temporäres Verzeichnis.',
            UPLOAD_ERR_CANT_WRITE => 'Fehler beim Schreiben.',
            UPLOAD_ERR_EXTENSION => 'Dateityp nicht erlaubt.',
        ];
        
        $message = isset($errorMessages[$file['error']]) ? $errorMessages[$file['error']] : 'Unbekannter Fehler.';
        echo json_encode(['success' => false, 'message' => $message]);
        return;
    }
    
    // Check file size
    if ($file['size'] > MAX_FILE_SIZE) {
        echo json_encode(['success' => false, 'message' => 'Datei ist zu groß. Maximal 2MB erlaubt.']);
        return;
    }
    
    // Check file extension
    $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    if (!in_array($extension, ALLOWED_EXTENSIONS)) {
        echo json_encode(['success' => false, 'message' => 'Dateityp nicht erlaubt. Nur JPG, PNG, GIF oder WebP.']);
        return;
    }
    
    // Generate unique filename
    $filename = uniqid('img_', true) . '.' . $extension;
    $uploadPath = UPLOAD_DIR . $filename;
    
    // Move uploaded file
    if (!move_uploaded_file($file['tmp_name'], $uploadPath)) {
        echo json_encode(['success' => false, 'message' => 'Fehler beim Hochladen.']);
        return;
    }
    
    // Return success with file URL
    $fileUrl = 'assets/images/user-uploads/' . $filename;
    echo json_encode(['success' => true, 'location' => $fileUrl, 'filename' => $filename]);
}

/**
 * List uploaded images
 */
function handleListImages() {
    $images = [];
    
    if (is_dir(UPLOAD_DIR)) {
        $files = scandir(UPLOAD_DIR);
        foreach ($files as $file) {
            if ($file !== '.' && $file !== '..') {
                $filePath = UPLOAD_DIR . $file;
                if (is_file($filePath)) {
                    $images[] = $file;
                }
            }
        }
    }
    
    sort($images);
    echo json_encode(['success' => true, 'images' => $images]);
}

/**
 * Delete image
 */
function handleDeleteImage() {
    $image = isset($_POST['image']) ? $_POST['image'] : '';
    
    if (empty($image)) {
        echo json_encode(['success' => false, 'message' => 'Kein Bild angegeben.']);
        return;
    }
    
    // Validate image name
    if (!preg_match('/^[a-zA-Z0-9_\-\.]+\.(jpg|jpeg|png|gif|webp)$/', $image)) {
        echo json_encode(['success' => false, 'message' => 'Ungültiger Bildname.']);
        return;
    }
    
    $imagePath = UPLOAD_DIR . $image;
    
    if (!file_exists($imagePath)) {
        echo json_encode(['success' => false, 'message' => 'Bild nicht gefunden.']);
        return;
    }
    
    if (!unlink($imagePath)) {
        echo json_encode(['success' => false, 'message' => 'Fehler beim Löschen.']);
        return;
    }
    
    echo json_encode(['success' => true, 'message' => 'Bild gelöscht.']);
}
?>
