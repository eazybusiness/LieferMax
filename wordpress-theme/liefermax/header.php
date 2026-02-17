<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
    
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap');
        
        * {
            font-family: 'Inter', sans-serif;
        }
        
        :root {
            --primary-red: #D32F2F;
            --primary-gray: #333333;
            --secondary-gray: #666666;
            --light-bg: #F5F5F5;
            --border: #E0E0E0;
        }
        
        .gradient-bg {
            background: linear-gradient(135deg, #D32F2F 0%, #E57373 100%);
        }
        
        .gradient-text {
            background: linear-gradient(135deg, #D32F2F 0%, #E57373 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .gradient-bg-alt {
            background: linear-gradient(135deg, #333333 0%, #666666 100%);
        }
        
        .card-hover {
            transition: all 0.3s ease;
        }
        
        .card-hover:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        }
        
        .hero-pattern {
            background: linear-gradient(135deg, #1a1a1a 0%, #333333 100%);
            position: relative;
        }
        
        .hero-pattern::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.03'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
            opacity: 1;
        }
        
        .animate-float {
            animation: float 3s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        
        .glass-effect {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
    </style>
    
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
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/liefermax-logo.png" alt="LieferMax Logo" class="h-16 w-auto">
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
