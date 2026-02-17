<?php
/**
 * Default Page Template
 */
get_header();
?>

<div class="pt-32 pb-24 px-4">
    <div class="max-w-7xl mx-auto">
        <?php while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <h1 class="text-4xl md:text-5xl font-black text-gray-900 mb-8"><?php the_title(); ?></h1>
                <div class="prose max-w-none">
                    <?php the_content(); ?>
                </div>
            </article>
        <?php endwhile; ?>
    </div>
</div>

<?php get_footer(); ?>
