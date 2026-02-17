<?php
/**
 * Template Name: Integration Page
 */
get_header();
?>

<div class="pt-32 pb-24 px-4 bg-gray-50">
    <div class="max-w-7xl mx-auto">
        
        <div class="text-center mb-16">
            <h1 class="text-5xl md:text-6xl font-black text-gray-900 mb-6">
                COPA <span class="gradient-text">Integration</span>
            </h1>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                LieferMax arbeitet nahtlos mit drink.3000 und drink.PRO zusammen.
            </p>
        </div>

        <!-- Integration Benefits -->
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 mb-16">
            <div class="bg-white rounded-2xl p-8 shadow-lg">
                <div class="w-16 h-16 bg-green-100 rounded-xl flex items-center justify-center mb-6">
                    <i class="fas fa-sync text-green-600 text-2xl"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Automatische Synchronisation</h3>
                <p class="text-gray-600">
                    Alle Lieferscheine und Rechnungen werden automatisch in Ihr COPA-System übertragen.
                </p>
            </div>

            <div class="bg-white rounded-2xl p-8 shadow-lg">
                <div class="w-16 h-16 bg-blue-100 rounded-xl flex items-center justify-center mb-6">
                    <i class="fas fa-database text-blue-600 text-2xl"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Keine Doppelerfassung</h3>
                <p class="text-gray-600">
                    Sparen Sie Zeit und vermeiden Sie Fehler durch automatische Datenübertragung.
                </p>
            </div>

            <div class="bg-white rounded-2xl p-8 shadow-lg">
                <div class="w-16 h-16 bg-purple-100 rounded-xl flex items-center justify-center mb-6">
                    <i class="fas fa-file-pdf text-purple-600 text-2xl"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">DMS Archivierung</h3>
                <p class="text-gray-600">
                    Automatische PDF-Ablage in Ihrem COPA Dokumentenarchiv.
                </p>
            </div>
        </div>

        <!-- Technical Details -->
        <div class="bg-white rounded-2xl p-12 shadow-lg mb-16">
            <h2 class="text-4xl font-black text-gray-900 mb-8 text-center">Technische Details</h2>
            <div class="grid md:grid-cols-2 gap-12">
                <div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-6">Unterstützte Systeme</h3>
                    <ul class="space-y-4">
                        <li class="flex items-center gap-3">
                            <i class="fas fa-check-circle text-green-600"></i>
                            <span class="text-gray-700">COPA drink.3000</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <i class="fas fa-check-circle text-green-600"></i>
                            <span class="text-gray-700">COPA drink.PRO</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <i class="fas fa-check-circle text-green-600"></i>
                            <span class="text-gray-700">COPA DMS</span>
                        </li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-6">Datenfluss</h3>
                    <ul class="space-y-4">
                        <li class="flex items-center gap-3">
                            <i class="fas fa-arrow-right text-red-600"></i>
                            <span class="text-gray-700">Touren aus COPA → LieferMax App</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <i class="fas fa-arrow-left text-red-600"></i>
                            <span class="text-gray-700">Lieferscheine → COPA System</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <i class="fas fa-arrow-left text-red-600"></i>
                            <span class="text-gray-700">PDFs → COPA DMS</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- COPA Logo -->
        <div class="text-center">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/copa_systeme_logo.png" alt="COPA Systeme" class="max-w-md mx-auto mb-8">
            <p class="text-xl text-gray-600 mb-8">
                Offizieller Technologiepartner von COPA Systeme
            </p>
            <a href="<?php echo home_url('/contact'); ?>" class="inline-block gradient-bg text-white px-10 py-5 rounded-lg font-bold text-lg hover:shadow-2xl transition transform hover:scale-105">
                Integration anfragen
            </a>
        </div>

    </div>
</div>

<?php get_footer(); ?>
