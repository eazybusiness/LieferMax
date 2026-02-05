<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header">
    <div class="container">
        <div class="header-inner">
            <!-- Logo -->
            <div class="site-logo">
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    <?php if (has_custom_logo()): ?>
                        <?php the_custom_logo(); ?>
                    <?php else: ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" 
                             alt="<?php bloginfo('name'); ?>" 
                             height="50">
                    <?php endif; ?>
                    <h1 class="site-title"><?php bloginfo('name'); ?></h1>
                </a>
            </div>
            
            <!-- Desktop Navigation -->
            <nav class="main-navigation" id="main-navigation">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'container'      => false,
                    'menu_class'     => '',
                    'fallback_cb'    => false,
                    'walker'         => new Liefermax_Walker_Nav_Menu(),
                ));
                ?>
            </nav>
            
            <!-- Mobile Menu Button -->
            <button class="mobile-menu-toggle" id="mobile-menu-button" aria-label="Toggle Menu">
                <i class="fas fa-bars"></i>
            </button>
        </div>
    </div>
    
    <!-- Mobile Menu -->
    <div class="main-navigation" id="mobile-menu">
        <?php
        wp_nav_menu(array(
            'theme_location' => 'primary',
            'container'      => false,
            'menu_class'     => '',
            'fallback_cb'    => false,
        ));
        ?>
    </div>
</header>

<div style="height: 80px;"></div>
