<?php
/**
 * Template Name: Homepage
 * Description: LieferMax Homepage Template
 */

get_header();
?>

<!-- Hero Section -->
<section class="hero-pattern pt-32 pb-24 px-4 relative overflow-hidden">
    <div class="max-w-7xl mx-auto relative z-10">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <div class="text-white">
                <div class="inline-block bg-red-500 bg-opacity-20 backdrop-blur-sm px-4 py-2 rounded-full mb-6 border border-red-400 border-opacity-30">
                    <span class="text-gray-200 text-sm font-semibold">✓ COPA Systeme Technologiepartner</span>
                </div>
                <h1 class="text-5xl md:text-7xl font-black mb-6 leading-tight">
                    <?php 
                    $hero_title = get_field('hero_title');
                    if ($hero_title) {
                        echo wp_kses_post($hero_title);
                    } else {
                        echo 'Wir optimieren die <span class="text-red-400">Getränke-Logistik!</span>';
                    }
                    ?>
                </h1>
                <p class="text-xl mb-8 text-gray-100 leading-relaxed">
                    <?php 
                    $hero_subtitle = get_field('hero_subtitle');
                    echo $hero_subtitle ? esc_html($hero_subtitle) : 'Digitalisieren Sie Ihren Lieferprozess mit LieferMax. Papierlose Lieferscheine, GPS-Tracking und nahtlose Integration mit COPA drink.3000 & drink.PRO.';
                    ?>
                </p>
                <div class="flex flex-wrap gap-4 mb-12">
                    <a href="https://apps.apple.com/de/app/liefer-max/id1659712322" target="_blank" class="bg-white text-red-600 px-8 py-4 rounded-lg font-bold text-lg hover:shadow-2xl transition transform hover:scale-105 inline-block">
                        <i class="fas fa-download mr-2"></i>App testen
                    </a>
                </div>
                <div class="grid grid-cols-2 gap-6">
                    <?php 
                    $stats = get_field('hero_stats');
                    if ($stats) :
                        foreach ($stats as $stat) : ?>
                            <div class="text-center">
                                <div class="text-4xl font-black text-red-300 mb-1"><?php echo esc_html($stat['number']); ?></div>
                                <div class="text-gray-200 text-sm"><?php echo esc_html($stat['label']); ?></div>
                            </div>
                        <?php endforeach;
                    else : ?>
                        <div class="text-center">
                            <div class="text-4xl font-black text-red-300 mb-1">100%</div>
                            <div class="text-gray-200 text-sm">Digital</div>
                        </div>
                        <div class="text-center">
                            <div class="text-4xl font-black text-red-300 mb-1">iOS</div>
                            <div class="text-gray-200 text-sm">Native App</div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="relative hidden lg:block">
                <div class="relative">
                    <div class="absolute inset-0 bg-gradient-to-r from-red-500 to-red-400 rounded-3xl blur-3xl opacity-30 animate-pulse"></div>
                    <div class="relative bg-white bg-opacity-10 backdrop-blur-lg rounded-3xl p-8 border border-white border-opacity-20 shadow-2xl">
                        <div class="grid grid-cols-2 gap-4">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/liefermax1.png" alt="LieferMax Screenshot 1" class="rounded-xl shadow-lg w-full cursor-pointer hover:scale-105 transition" onclick="openImageModal('<?php echo get_template_directory_uri(); ?>/assets/images/liefermax1.png')">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/liefermax2.png" alt="LieferMax Screenshot 2" class="rounded-xl shadow-lg w-full cursor-pointer hover:scale-105 transition" onclick="openImageModal('<?php echo get_template_directory_uri(); ?>/assets/images/liefermax2.png')">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/liefermax3.png" alt="LieferMax Screenshot 3" class="rounded-xl shadow-lg w-full cursor-pointer hover:scale-105 transition" onclick="openImageModal('<?php echo get_template_directory_uri(); ?>/assets/images/liefermax3.png')">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/liefermax4.png" alt="LieferMax Screenshot 4" class="rounded-xl shadow-lg w-full cursor-pointer hover:scale-105 transition" onclick="openImageModal('<?php echo get_template_directory_uri(); ?>/assets/images/liefermax4.png')">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Products Section -->
<section class="py-24 px-4 bg-gradient-to-b from-gray-50 to-white">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-16">
            <div class="inline-block bg-red-100 text-red-700 px-4 py-2 rounded-full mb-4 font-semibold text-sm">
                UNSERE LÖSUNGEN
            </div>
            <h2 class="text-4xl md:text-5xl font-black text-gray-900 mb-4">
                Komplette Digitalisierung Ihrer <span class="gradient-text">Getränkelogistik</span>
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Von der Tourenplanung bis zur Abrechnung – LieferMax deckt alle Prozesse ab und integriert nahtlos mit COPA Systeme.
            </p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php
            $products = array(
                array('slug' => 'liefermax', 'icon' => 'liefermax-icon-21092015_app-store.png', 'title' => 'LieferMax App', 'desc' => 'Digitaler Lieferschein für iPhone & iPad. Kompletter Auslieferungsprozess optimiert gesteuert.'),
                array('slug' => 'check', 'icon' => 'LM-Check_1-150x150.png', 'title' => 'LieferMax-CHECK', 'desc' => 'Leergutkontroll-App. Scannen oder händische Eingabe für perfekte Tourenabgleiche.'),
                array('slug' => 'map', 'icon' => 'LM-Map.png', 'title' => 'LieferMax-MAP', 'desc' => 'GPS-Routing Tool. Alle Fahrzeuge live verfolgen und Lieferzustand auswerten.'),
                array('slug' => 'shop', 'icon' => 'shop-converter-150x150.png', 'title' => 'Shop-Konverter', 'desc' => 'ShopWare & WooCommerce Integration. Nahtlose Anbindung an COPA drink.3000 & drink.PRO.'),
                array('slug' => 'apps', 'icon' => 'lieferapps-150x150.png', 'title' => 'Liefer Apps', 'desc' => 'Native iOS & Android Apps. Verbindung mit ShopWare und COPA Systemen.'),
                array('slug' => 'kasse', 'icon' => 'kassenkonverter-150x150.png', 'title' => 'Kassen-Konverter', 'desc' => 'Getränke-Markt-Kasse mit COPA verbinden. Artikel und Umsätze synchron halten.'),
            );
            
            foreach ($products as $product) : ?>
                <a href="<?php echo home_url('/products#' . $product['slug']); ?>" class="card-hover group bg-white rounded-2xl p-8 border-2 border-gray-200 hover:border-red-500 transition-all">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/<?php echo $product['icon']; ?>" alt="<?php echo $product['title']; ?>" class="w-[150px] h-[150px] mb-6 group-hover:scale-110 transition-transform">
                    <h3 class="text-2xl font-bold text-gray-900 mb-3"><?php echo $product['title']; ?></h3>
                    <p class="text-gray-600 leading-relaxed mb-4"><?php echo $product['desc']; ?></p>
                    <div class="flex items-center text-red-600 font-semibold group-hover:gap-2 transition-all">
                        Mehr erfahren <i class="fas fa-arrow-right ml-2"></i>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- COPA Integration Section -->
<section class="py-24 px-4 bg-white">
    <div class="max-w-7xl mx-auto">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <div>
                <div class="inline-block bg-red-100 text-red-700 px-4 py-2 rounded-full mb-4 font-semibold text-sm">
                    TECHNOLOGIEPARTNER
                </div>
                <h2 class="text-4xl md:text-5xl font-black text-gray-900 mb-6">
                    Nahtlose Integration mit <span class="gradient-text">COPA Systeme</span>
                </h2>
                <p class="text-xl text-gray-600 mb-8 leading-relaxed">
                    LieferMax arbeitet perfekt mit drink.3000 und drink.PRO zusammen. Alle Daten werden automatisch synchronisiert – keine doppelte Datenpflege mehr.
                </p>
                <div class="space-y-4 mb-8">
                    <div class="flex items-start gap-4">
                        <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center flex-shrink-0 mt-1">
                            <i class="fas fa-check text-green-600"></i>
                        </div>
                        <div>
                            <div class="font-bold text-gray-900 mb-1">Automatische Datenübertragung</div>
                            <div class="text-gray-600">Lieferscheine und Rechnungen direkt in Ihr COPA-System</div>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center flex-shrink-0 mt-1">
                            <i class="fas fa-check text-green-600"></i>
                        </div>
                        <div>
                            <div class="font-bold text-gray-900 mb-1">Keine Rückerfassung nötig</div>
                            <div class="text-gray-600">Sparen Sie Zeit und vermeiden Sie Fehler</div>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center flex-shrink-0 mt-1">
                            <i class="fas fa-check text-green-600"></i>
                        </div>
                        <div>
                            <div class="font-bold text-gray-900 mb-1">DMS Archivierung inklusive</div>
                            <div class="text-gray-600">Automatische PDF-Ablage in Ihrem Dokumentenarchiv</div>
                        </div>
                    </div>
                </div>
                <a href="<?php echo home_url('/integration'); ?>" class="inline-block gradient-bg text-white px-8 py-4 rounded-lg font-bold hover:shadow-xl transition">
                    Mehr zur Integration <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
            <div>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/copa_systeme_logo.png" alt="COPA Systeme Logo" class="w-full max-w-md mx-auto">
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="gradient-bg py-24 px-4">
    <div class="max-w-4xl mx-auto text-center text-white">
        <h2 class="text-4xl md:text-5xl font-black mb-6">
            Bereit für die digitale Transformation?
        </h2>
        <p class="text-xl mb-8 text-gray-100">
            Vereinbaren Sie jetzt eine kostenlose Demo und erleben Sie LieferMax in Aktion.
        </p>
        <a href="<?php echo home_url('/contact'); ?>" class="inline-block bg-white text-red-600 px-10 py-5 rounded-lg font-bold text-lg hover:shadow-2xl transition transform hover:scale-105">
            Jetzt Demo anfragen
        </a>
    </div>
</section>

<!-- Image Modal -->
<div id="imageModal" class="modal">
    <span class="modal-close" onclick="closeImageModal()">&times;</span>
    <img class="modal-content" id="modalImage">
</div>

<?php get_footer(); ?>
