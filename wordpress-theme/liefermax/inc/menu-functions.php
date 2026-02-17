<?php
/**
 * Menu Helper Functions
 */

// Default menu fallback for desktop
function liefermax_default_menu() {
    $menu_items = array(
        array('url' => home_url('/'), 'title' => 'Home'),
        array('url' => home_url('/products#liefermax'), 'title' => 'LieferMax'),
        array('url' => home_url('/products#check'), 'title' => 'LM-CHECK'),
        array('url' => home_url('/products#map'), 'title' => 'LM-MAP'),
        array('url' => home_url('/products#shop'), 'title' => 'ShopWare & WooCommerce'),
        array('url' => home_url('/products#apps'), 'title' => 'Bestell App'),
    );
    
    foreach ($menu_items as $item) {
        $current = (get_permalink() == $item['url']) ? 'text-gray-900' : 'text-gray-600';
        echo '<a href="' . esc_url($item['url']) . '" class="' . $current . ' hover:text-red-600 font-medium transition">' . esc_html($item['title']) . '</a>';
    }
}

// Default menu fallback for mobile
function liefermax_default_menu_mobile() {
    $menu_items = array(
        array('url' => home_url('/'), 'title' => 'Home'),
        array('url' => home_url('/products#liefermax'), 'title' => 'LieferMax'),
        array('url' => home_url('/products#check'), 'title' => 'LM-CHECK'),
        array('url' => home_url('/products#map'), 'title' => 'LM-MAP'),
        array('url' => home_url('/products#shop'), 'title' => 'ShopWare & WooCommerce'),
        array('url' => home_url('/products#apps'), 'title' => 'Bestell App'),
    );
    
    foreach ($menu_items as $item) {
        $current = (get_permalink() == $item['url']) ? 'text-gray-900' : 'text-gray-600';
        echo '<a href="' . esc_url($item['url']) . '" class="' . $current . ' hover:text-red-600 font-medium transition py-2">' . esc_html($item['title']) . '</a>';
    }
}
