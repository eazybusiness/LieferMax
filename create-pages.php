<?php
/**
 * Create all WordPress pages with templates
 * Run: docker exec liefermax-wordpress php /var/www/html/wp-content/themes/liefermax/create-pages.php
 */

define('WP_USE_THEMES', false);
require('/var/www/html/wp-load.php');

$pages = array(
    array(
        'title' => 'Home',
        'slug' => 'home',
        'template' => 'front-page.php',
        'content' => ''
    ),
    array(
        'title' => 'Produkte',
        'slug' => 'products',
        'template' => 'page-products.php',
        'content' => 'Unsere Produktpalette für die digitale Getränkelogistik.'
    ),
    array(
        'title' => 'Integration',
        'slug' => 'integration',
        'template' => 'page-integration.php',
        'content' => 'COPA Systeme Integration - drink.3000 und drink.PRO.'
    ),
    array(
        'title' => 'Kontakt',
        'slug' => 'contact',
        'template' => 'page-contact.php',
        'content' => 'Kontaktieren Sie uns für weitere Informationen.'
    ),
    array(
        'title' => 'Weitere Tools',
        'slug' => 'weitere-tools',
        'template' => 'page.php',
        'content' => 'Weitere Tools und Lösungen von LieferMax.'
    ),
    array(
        'title' => 'Impressum',
        'slug' => 'impressum',
        'template' => 'page-impressum.php',
        'content' => '<h2>Angaben gemäß § 5 TMG</h2>
<p>LieferMax GmbH<br>
An der Leiten 4<br>
D-87672 Roßhaupten</p>

<h2>Kontakt</h2>
<p>Telefon: 08367 – 91 39 187<br>
E-Mail: info@liefermax.com</p>

<h2>Verantwortlich für den Inhalt nach § 55 Abs. 2 RStV</h2>
<p>LieferMax GmbH<br>
An der Leiten 4<br>
D-87672 Roßhaupten</p>'
    ),
    array(
        'title' => 'Datenschutzerklärung',
        'slug' => 'datenschutz',
        'template' => 'page-datenschutz.php',
        'content' => '<h2>1. Datenschutz auf einen Blick</h2>
<p>Die folgenden Hinweise geben einen einfachen Überblick darüber, was mit Ihren personenbezogenen Daten passiert, wenn Sie diese Website besuchen.</p>

<h2>2. Allgemeine Hinweise und Pflichtinformationen</h2>
<p>Die Betreiber dieser Seiten nehmen den Schutz Ihrer persönlichen Daten sehr ernst.</p>'
    ),
    array(
        'title' => 'AGB',
        'slug' => 'agb',
        'template' => 'page-agb.php',
        'content' => '<h2>Allgemeine Geschäftsbedingungen</h2>
<p>Diese Allgemeinen Geschäftsbedingungen gelten für alle Verträge zwischen LieferMax GmbH und unseren Kunden.</p>

<h2>§ 1 Geltungsbereich</h2>
<p>Diese AGB gelten für alle Geschäftsbeziehungen mit unseren Kunden.</p>'
    )
);

echo "Creating WordPress pages...\n\n";

foreach ($pages as $page_data) {
    // Check if page already exists
    $existing_page = get_page_by_path($page_data['slug']);
    
    if ($existing_page) {
        echo "✓ Page '{$page_data['title']}' already exists (ID: {$existing_page->ID})\n";
        
        // Update template
        update_post_meta($existing_page->ID, '_wp_page_template', $page_data['template']);
        echo "  → Template updated to: {$page_data['template']}\n";
        
        continue;
    }
    
    // Create new page
    $page_id = wp_insert_post(array(
        'post_title' => $page_data['title'],
        'post_name' => $page_data['slug'],
        'post_content' => $page_data['content'],
        'post_type' => 'page',
        'post_status' => 'publish',
        'page_template' => $page_data['template']
    ));
    
    if ($page_id && !is_wp_error($page_id)) {
        // Set template
        update_post_meta($page_id, '_wp_page_template', $page_data['template']);
        
        echo "✓ Created page '{$page_data['title']}' (ID: {$page_id})\n";
        echo "  → Slug: {$page_data['slug']}\n";
        echo "  → Template: {$page_data['template']}\n";
        echo "  → URL: http://localhost:8080/{$page_data['slug']}/\n\n";
    } else {
        echo "✗ Failed to create page '{$page_data['title']}'\n\n";
    }
}

// Set homepage
$home_page = get_page_by_path('home');
if ($home_page) {
    update_option('page_on_front', $home_page->ID);
    update_option('show_on_front', 'page');
    echo "✓ Set 'Home' as front page\n";
}

echo "\n✅ All pages created successfully!\n";
echo "\nNext steps:\n";
echo "1. Visit: http://localhost:8080\n";
echo "2. Check all pages work correctly\n";
echo "3. Test design match with static HTML\n";
?>
