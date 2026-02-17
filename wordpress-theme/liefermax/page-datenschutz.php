<?php
/**
 * Template Name: Datenschutz
 */
get_header();
?>

<div class="pt-32 pb-24 px-4 bg-gray-50">
    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-2xl p-12 shadow-lg">
            <h1 class="text-4xl font-black text-gray-900 mb-8">Datenschutzerklärung</h1>
            
            <?php while (have_posts()) : the_post(); ?>
                <div class="prose max-w-none">
                    <?php the_content(); ?>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
