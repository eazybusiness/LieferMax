<?php
/**
 * LieferMax Theme Functions
 * 
 * @package LieferMax
 * @version 1.0.0
 */

// Theme Setup
function liefermax_setup() {
    // Add default posts and comments RSS feed links to head
    add_theme_support('automatic-feed-links');
    
    // Let WordPress manage the document title
    add_theme_support('title-tag');
    
    // Enable support for Post Thumbnails
    add_theme_support('post-thumbnails');
    
    // Enable support for custom logo
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
    ));
    
    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'liefermax'),
        'footer'  => __('Footer Menu', 'liefermax'),
    ));
    
    // Add support for HTML5 markup
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
    
    // Add support for responsive embeds
    add_theme_support('responsive-embeds');
}
add_action('after_setup_theme', 'liefermax_setup');

// Enqueue styles and scripts
function liefermax_enqueue_assets() {
    // TailwindCSS CDN
    wp_enqueue_style('tailwindcss', 'https://cdn.jsdelivr.net/npm/tailwindcss@3.4.0/dist/tailwind.min.css', array(), '3.4.0');
    
    // Font Awesome
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css', array(), '6.4.0');
    
    // Custom CSS
    wp_enqueue_style('liefermax-main', get_template_directory_uri() . '/assets/css/main.css', array('tailwindcss'), '1.0.0');
    
    // Custom JavaScript
    wp_enqueue_script('liefermax-main', get_template_directory_uri() . '/assets/js/main.js', array(), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'liefermax_enqueue_assets');

// Add custom image sizes
add_image_size('liefermax-hero', 1920, 1080, true);
add_image_size('liefermax-product', 800, 600, true);
add_image_size('liefermax-thumbnail', 400, 300, true);

// Customize excerpt length
function liefermax_excerpt_length($length) {
    return 30;
}
add_filter('excerpt_length', 'liefermax_excerpt_length');

// Customize excerpt more
function liefermax_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'liefermax_excerpt_more');

// Add custom body classes
function liefermax_body_classes($classes) {
    if (!is_front_page()) {
        $classes[] = 'inner-page';
    }
    return $classes;
}
add_filter('body_class', 'liefermax_body_classes');

// Register widget areas
function liefermax_widgets_init() {
    register_sidebar(array(
        'name'          => __('Footer Widget Area', 'liefermax'),
        'id'            => 'footer-widgets',
        'description'   => __('Appears in the footer section', 'liefermax'),
        'before_widget' => '<div class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'liefermax_widgets_init');

// Custom navigation walker for TailwindCSS
class Liefermax_Walker_Nav_Menu extends Walker_Nav_Menu {
    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args, $depth));
        
        $output .= '<li class="' . esc_attr($class_names) . '">';
        
        $attributes = '';
        $attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';
        $attributes .= ' class="text-gray-700 hover:text-red-600 transition-colors duration-300 font-medium"';
        
        $item_output = $args->before;
        $item_output .= '<a' . $attributes . '>';
        $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;
        
        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
}

// Allow SVG uploads
function liefermax_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'liefermax_mime_types');

// Remove WordPress version from head
remove_action('wp_head', 'wp_generator');

// Disable XML-RPC
add_filter('xmlrpc_enabled', '__return_false');
