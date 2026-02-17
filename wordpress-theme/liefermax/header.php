<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
    
    <!-- Structured Data for SEO -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "SoftwareApplication",
      "name": "LieferMax",
      "applicationCategory": "BusinessApplication",
      "operatingSystem": "iOS",
      "offers": {
        "@type": "Offer",
        "price": "0",
        "priceCurrency": "EUR"
      },
      "description": "Digitale Getränkelogistik-Lösung mit COPA-Integration für Getränkefachgroßhandel",
      "provider": {
        "@type": "Organization",
        "name": "LieferMax GmbH",
        "address": {
          "@type": "PostalAddress",
          "streetAddress": "An der Leiten 4",
          "postalCode": "87672",
          "addressLocality": "Roßhaupten",
          "addressCountry": "DE"
        },
        "telephone": "+49-8367-913-9187",
        "email": "info@liefermax.com",
        "url": "<?php echo home_url(); ?>"
      }
    }
    </script>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- Navigation -->
<nav class="bg-white shadow-lg fixed w-full top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
            <div class="flex items-center">
                <div class="flex-shrink-0 flex items-center space-x-3">
                    <?php if (has_custom_logo()) : ?>
                        <?php the_custom_logo(); ?>
                    <?php else : ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.jpg" alt="LieferMax Logo" class="h-12 w-12 rounded-lg">
                    <?php endif; ?>
                    <h1 class="text-3xl font-bold text-gray-800">
                        <a href="<?php echo home_url(); ?>" class="text-gray-800 hover:text-red-600 transition">
                            <?php bloginfo('name'); ?>
                        </a>
                    </h1>
                </div>
            </div>
            <div class="hidden md:block">
                <div class="ml-10 flex items-center space-x-8">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'container' => false,
                        'menu_class' => '',
                        'items_wrap' => '%3$s',
                        'fallback_cb' => 'liefermax_default_menu',
                    ));
                    ?>
                    <a href="https://apps.apple.com/de/app/liefermax/id1349464950" target="_blank" class="gradient-bg text-white px-6 py-3 rounded-lg font-semibold hover:shadow-lg transition">
                        App testen
                    </a>
                </div>
            </div>
            <div class="md:hidden">
                <button id="mobile-menu-button" class="text-gray-600 hover:text-red-600">
                    <i class="fas fa-bars text-2xl"></i>
                </button>
            </div>
        </div>
        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden bg-white border-t border-gray-200 py-4">
            <div class="flex flex-col space-y-4 px-4">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'container' => false,
                    'menu_class' => '',
                    'items_wrap' => '%3$s',
                    'fallback_cb' => 'liefermax_default_menu_mobile',
                ));
                ?>
                <a href="https://apps.apple.com/de/app/liefermax/id1349464950" target="_blank" class="gradient-bg text-white px-6 py-3 rounded-lg font-semibold text-center hover:shadow-lg transition">App testen</a>
            </div>
        </div>
    </div>
</nav>
