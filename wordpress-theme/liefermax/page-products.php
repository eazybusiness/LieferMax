<?php
/**
 * Template Name: Products Page
 * Description: Products overview page
 */
get_header();
?>

<div class="pt-32 pb-24 px-4 bg-gray-50">
    <div class="max-w-7xl mx-auto">
        
        <!-- Page Header -->
        <div class="text-center mb-16">
            <h1 class="text-5xl md:text-6xl font-black text-gray-900 mb-6">
                Unsere <span class="gradient-text">Produkte</span>
            </h1>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Komplette Digitalisierung Ihrer Getränkelogistik – von der Tourenplanung bis zur Abrechnung.
            </p>
        </div>

        <!-- LieferMax App Section -->
        <section id="liefermax" class="mb-24 bg-white rounded-2xl p-12 shadow-lg">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div>
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/liefermax-icon-21092015_app-store.png" alt="LieferMax App" class="w-48 h-48 mb-6">
                    <h2 class="text-4xl font-black text-gray-900 mb-6">LieferMax App</h2>
                    <p class="text-xl text-gray-600 mb-8">
                        Die LieferMax App ist Ihr digitaler Lieferschein für iPhone und iPad. Optimieren Sie Ihren kompletten Auslieferungsprozess.
                    </p>
                    <div class="space-y-3 mb-8">
                        <?php
                        $features = array(
                            'Digitaler Lieferschein',
                            'GPS-Tracking',
                            'Unterschrift auf dem iPad',
                            'Foto-Dokumentation',
                            'Offline-Modus',
                            'COPA Integration',
                            'Automatische Synchronisation',
                            'PDF-Export'
                        );
                        foreach ($features as $feature) : ?>
                            <div class="flex items-center gap-3">
                                <i class="fas fa-check-circle text-green-600"></i>
                                <span class="text-gray-700"><?php echo $feature; ?></span>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <a href="https://apps.apple.com/de/app/liefermax/id1349464950" target="_blank" class="inline-block gradient-bg text-white px-8 py-4 rounded-lg font-bold hover:shadow-xl transition">
                        <i class="fab fa-apple mr-2"></i>Im App Store laden
                    </a>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/liefermax1.png" alt="Screenshot 1" class="rounded-xl shadow-lg">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/liefermax2.png" alt="Screenshot 2" class="rounded-xl shadow-lg">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/liefermax3.png" alt="Screenshot 3" class="rounded-xl shadow-lg">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/liefermax4.png" alt="Screenshot 4" class="rounded-xl shadow-lg">
                </div>
            </div>
        </section>

        <!-- LM-CHECK Section -->
        <section id="check" class="mb-24 bg-white rounded-2xl p-12 shadow-lg">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div class="order-2 lg:order-1">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/LM-Check_1.png" alt="LM-CHECK Screenshot" class="rounded-xl shadow-2xl">
                </div>
                <div class="order-1 lg:order-2">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/LM-Check_1-150x150.png" alt="LM-CHECK" class="w-48 h-48 mb-6">
                    <h2 class="text-4xl font-black text-gray-900 mb-6">LieferMax-CHECK</h2>
                    <p class="text-xl text-gray-600 mb-8">
                        Die Leergutkontroll-App für perfekte Tourenabgleiche. Scannen oder händische Eingabe.
                    </p>
                    <div class="space-y-3">
                        <?php
                        $check_features = array(
                            'Leergut-Erfassung',
                            'Barcode-Scanner',
                            'Manuelle Eingabe',
                            'Tourenabgleich',
                            'Differenz-Anzeige',
                            'Export-Funktion'
                        );
                        foreach ($check_features as $feature) : ?>
                            <div class="flex items-center gap-3">
                                <i class="fas fa-check-circle text-green-600"></i>
                                <span class="text-gray-700"><?php echo $feature; ?></span>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </section>

        <!-- LM-MAP Section -->
        <section id="map" class="mb-24 bg-white rounded-2xl p-12 shadow-lg">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div>
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/LM-Map.png" alt="LM-MAP" class="w-48 h-48 mb-6">
                    <h2 class="text-4xl font-black text-gray-900 mb-6">LieferMax-MAP</h2>
                    <p class="text-xl text-gray-600 mb-8">
                        GPS-Routing Tool. Verfolgen Sie alle Fahrzeuge live und werten Sie den Lieferzustand aus.
                    </p>
                    <div class="space-y-3">
                        <?php
                        $map_features = array(
                            'Live GPS-Tracking',
                            'Routenoptimierung',
                            'Lieferstatus in Echtzeit',
                            'Fahrzeug-Übersicht',
                            'Historische Daten',
                            'Dashboard-Ansicht'
                        );
                        foreach ($map_features as $feature) : ?>
                            <div class="flex items-center gap-3">
                                <i class="fas fa-check-circle text-green-600"></i>
                                <span class="text-gray-700"><?php echo $feature; ?></span>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div>
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/LM-Map-1.png" alt="LM-MAP Dashboard" class="rounded-xl shadow-2xl">
                </div>
            </div>
        </section>

        <!-- Shop-Konverter Section -->
        <section id="shop" class="mb-24 bg-white rounded-2xl p-12 shadow-lg">
            <div class="text-center mb-12">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shop-converter-150x150.png" alt="Shop-Konverter" class="w-48 h-48 mx-auto mb-6">
                <h2 class="text-4xl font-black text-gray-900 mb-6">Shop-Konverter</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Nahtlose Integration von ShopWare und WooCommerce mit COPA drink.3000 & drink.PRO.
                </p>
            </div>
            <div class="grid md:grid-cols-3 gap-8 mb-12">
                <div class="text-center">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shopware-logo.png" alt="ShopWare" class="h-20 mx-auto mb-4">
                    <h3 class="font-bold text-gray-900">ShopWare</h3>
                </div>
                <div class="text-center">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/woocommerce-logo.png" alt="WooCommerce" class="h-20 mx-auto mb-4">
                    <h3 class="font-bold text-gray-900">WooCommerce</h3>
                </div>
                <div class="text-center">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/copa_systeme_logo.png" alt="COPA" class="h-20 mx-auto mb-4">
                    <h3 class="font-bold text-gray-900">COPA Systeme</h3>
                </div>
            </div>
        </section>

        <!-- Bestell-Apps Section -->
        <section id="apps" class="mb-24 bg-white rounded-2xl p-12 shadow-lg">
            <div class="text-center">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/lieferapps-150x150.png" alt="Liefer Apps" class="w-48 h-48 mx-auto mb-6">
                <h2 class="text-4xl font-black text-gray-900 mb-6">Bestell-Apps</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto mb-8">
                    Native iOS & Android Apps mit Verbindung zu ShopWare und COPA Systemen.
                </p>
                <div class="flex justify-center gap-4">
                    <a href="#" class="inline-block bg-black text-white px-8 py-4 rounded-lg font-bold hover:shadow-xl transition">
                        <i class="fab fa-apple mr-2"></i>App Store
                    </a>
                    <a href="#" class="inline-block bg-green-600 text-white px-8 py-4 rounded-lg font-bold hover:shadow-xl transition">
                        <i class="fab fa-google-play mr-2"></i>Google Play
                    </a>
                </div>
            </div>
        </section>

        <!-- Kassen-Konverter Section -->
        <section id="kasse" class="bg-white rounded-2xl p-12 shadow-lg">
            <div class="text-center">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/kassenkonverter-150x150.png" alt="Kassen-Konverter" class="w-48 h-48 mx-auto mb-6">
                <h2 class="text-4xl font-black text-gray-900 mb-6">Kassen-Konverter</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto mb-8">
                    Verbinden Sie Ihre Getränke-Markt-Kasse mit COPA. Artikel und Umsätze bleiben synchron.
                </p>
                <div class="space-y-3 max-w-2xl mx-auto">
                    <?php
                    $kasse_features = array(
                        'Automatische Artikel-Synchronisation',
                        'Umsatz-Übertragung',
                        'Bestandsabgleich',
                        'Echtzeit-Daten'
                    );
                    foreach ($kasse_features as $feature) : ?>
                        <div class="flex items-center gap-3 justify-center">
                            <i class="fas fa-check-circle text-green-600"></i>
                            <span class="text-gray-700"><?php echo $feature; ?></span>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

    </div>
</div>

<!-- CTA Section -->
<section class="gradient-bg py-24 px-4">
    <div class="max-w-4xl mx-auto text-center text-white">
        <h2 class="text-4xl md:text-5xl font-black mb-6">
            Interessiert an unseren Produkten?
        </h2>
        <p class="text-xl mb-8 text-gray-100">
            Vereinbaren Sie jetzt eine kostenlose Demo und testen Sie LieferMax.
        </p>
        <a href="<?php echo home_url('/contact'); ?>" class="inline-block bg-white text-red-600 px-10 py-5 rounded-lg font-bold text-lg hover:shadow-2xl transition transform hover:scale-105">
            Jetzt Demo anfragen
        </a>
    </div>
</section>

<?php get_footer(); ?>
