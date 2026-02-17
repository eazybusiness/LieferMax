<?php
/**
 * LieferMax Theme Functions
 * 
 * @package LieferMax
 * @version 1.0.0
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Include helper functions
require_once get_template_directory() . '/inc/menu-functions.php';

/**
 * Theme Setup
 */
function liefermax_setup() {
    // Add theme support
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
    add_theme_support('custom-logo');
    
    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'liefermax'),
        'footer' => __('Footer Menu', 'liefermax'),
    ));
}
add_action('after_setup_theme', 'liefermax_setup');

/**
 * Enqueue Scripts and Styles
 */
function liefermax_enqueue_scripts() {
    // TailwindCSS CDN - Load as script for proper initialization
    wp_enqueue_script('tailwindcss', 'https://cdn.tailwindcss.com', array(), null, false);
    
    // Font Awesome
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css', array(), '6.4.0');
    
    // Google Fonts
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap', array(), null);
    
    // Theme CSS
    wp_enqueue_style('liefermax-style', get_template_directory_uri() . '/assets/css/main.css', array(), '1.0.0');
    
    // Theme JavaScript
    wp_enqueue_script('liefermax-main', get_template_directory_uri() . '/assets/js/main.js', array(), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'liefermax_enqueue_scripts');

/**
 * ACF Options Page
 */
if (function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
        'page_title' => 'Theme Settings',
        'menu_title' => 'Theme Settings',
        'menu_slug' => 'theme-settings',
        'capability' => 'edit_posts',
        'redirect' => false
    ));
}

/**
 * Register ACF Fields Programmatically
 */
function liefermax_register_acf_fields() {
    if (!function_exists('acf_add_local_field_group')) {
        return;
    }
    
    // Global Settings
    acf_add_local_field_group(array(
        'key' => 'group_global_settings',
        'title' => 'Global Settings',
        'fields' => array(
            array(
                'key' => 'field_company_name',
                'label' => 'Company Name',
                'name' => 'company_name',
                'type' => 'text',
                'default_value' => 'LieferMax',
            ),
            array(
                'key' => 'field_company_phone',
                'label' => 'Phone',
                'name' => 'company_phone',
                'type' => 'text',
                'default_value' => '08367 – 91 39 187',
            ),
            array(
                'key' => 'field_company_email',
                'label' => 'Email',
                'name' => 'company_email',
                'type' => 'email',
                'default_value' => 'info@liefermax.com',
            ),
            array(
                'key' => 'field_company_address',
                'label' => 'Address',
                'name' => 'company_address',
                'type' => 'textarea',
                'default_value' => "An der Leiten 4\nD-87672 Roßhaupten",
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'theme-settings',
                ),
            ),
        ),
    ));
    
    // Hero Section Fields
    acf_add_local_field_group(array(
        'key' => 'group_hero_section',
        'title' => 'Hero Section',
        'fields' => array(
            array(
                'key' => 'field_hero_title',
                'label' => 'Hero Title',
                'name' => 'hero_title',
                'type' => 'text',
            ),
            array(
                'key' => 'field_hero_subtitle',
                'label' => 'Hero Subtitle',
                'name' => 'hero_subtitle',
                'type' => 'textarea',
            ),
            array(
                'key' => 'field_hero_cta_text',
                'label' => 'CTA Button Text',
                'name' => 'hero_cta_text',
                'type' => 'text',
                'default_value' => 'Demo anfragen',
            ),
            array(
                'key' => 'field_hero_cta_link',
                'label' => 'CTA Button Link',
                'name' => 'hero_cta_link',
                'type' => 'page_link',
            ),
            array(
                'key' => 'field_hero_stats',
                'label' => 'Hero Stats',
                'name' => 'hero_stats',
                'type' => 'repeater',
                'layout' => 'table',
                'sub_fields' => array(
                    array(
                        'key' => 'field_stat_number',
                        'label' => 'Number',
                        'name' => 'number',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_stat_label',
                        'label' => 'Label',
                        'name' => 'label',
                        'type' => 'text',
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'default',
                ),
            ),
        ),
    ));
    
    // Content Blocks
    acf_add_local_field_group(array(
        'key' => 'group_content_blocks',
        'title' => 'Content Blocks',
        'fields' => array(
            array(
                'key' => 'field_content_blocks',
                'label' => 'Content Blocks',
                'name' => 'content_blocks',
                'type' => 'repeater',
                'layout' => 'block',
                'sub_fields' => array(
                    array(
                        'key' => 'field_block_title',
                        'label' => 'Block Title',
                        'name' => 'block_title',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_block_content',
                        'label' => 'Block Content',
                        'name' => 'block_content',
                        'type' => 'wysiwyg',
                    ),
                    array(
                        'key' => 'field_block_image',
                        'label' => 'Block Image',
                        'name' => 'block_image',
                        'type' => 'image',
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'page',
                ),
            ),
        ),
    ));
    
    // Product Fields
    acf_add_local_field_group(array(
        'key' => 'group_product_fields',
        'title' => 'Product Fields',
        'fields' => array(
            array(
                'key' => 'field_product_icon',
                'label' => 'Product Icon',
                'name' => 'product_icon',
                'type' => 'image',
            ),
            array(
                'key' => 'field_product_description',
                'label' => 'Product Description',
                'name' => 'product_description',
                'type' => 'wysiwyg',
            ),
            array(
                'key' => 'field_product_features',
                'label' => 'Product Features',
                'name' => 'product_features',
                'type' => 'repeater',
                'layout' => 'table',
                'sub_fields' => array(
                    array(
                        'key' => 'field_feature_text',
                        'label' => 'Feature',
                        'name' => 'feature_text',
                        'type' => 'text',
                    ),
                ),
            ),
            array(
                'key' => 'field_product_screenshots',
                'label' => 'Product Screenshots',
                'name' => 'product_screenshots',
                'type' => 'gallery',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'page-products.php',
                ),
            ),
        ),
    ));
}
add_action('acf/init', 'liefermax_register_acf_fields');

/**
 * Custom Body Classes
 */
function liefermax_body_classes($classes) {
    $classes[] = 'bg-gray-50';
    return $classes;
}
add_filter('body_class', 'liefermax_body_classes');

/**
 * Remove WordPress Version from Head
 */
remove_action('wp_head', 'wp_generator');

/**
 * Clean up WordPress Head
 */
function liefermax_cleanup_head() {
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'wp_shortlink_wp_head');
}
add_action('init', 'liefermax_cleanup_head');
