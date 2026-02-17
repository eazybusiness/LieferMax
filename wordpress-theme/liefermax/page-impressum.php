<?php
/**
 * Template Name: Impressum
 */
get_header();
?>

<div class="pt-32 pb-24 px-4 bg-gray-50">
    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-2xl p-12 shadow-lg">
            <h1 class="text-4xl font-black text-gray-900 mb-8">Impressum</h1>
            
            <?php while (have_posts()) : the_post(); ?>
                <div class="prose max-w-none">
                    <?php the_content(); ?>
                </div>
            <?php endwhile; ?>
            
            <!-- Default Content if empty -->
            <?php if (!get_the_content()) : ?>
                <div class="space-y-6 text-gray-700">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900 mb-4">Angaben gemäß § 5 TMG</h2>
                        <p>
                            LieferMax GmbH<br>
                            An der Leiten 4<br>
                            D-87672 Roßhaupten
                        </p>
                    </div>
                    
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900 mb-4">Kontakt</h2>
                        <p>
                            Telefon: 08367 – 91 39 187<br>
                            E-Mail: info@liefermax.com
                        </p>
                    </div>
                    
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900 mb-4">Verantwortlich für den Inhalt nach § 55 Abs. 2 RStV</h2>
                        <p>
                            LieferMax GmbH<br>
                            An der Leiten 4<br>
                            D-87672 Roßhaupten
                        </p>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
