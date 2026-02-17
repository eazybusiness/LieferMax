<?php
/**
 * Index Template (Fallback)
 */
get_header();
?>

<div class="pt-32 pb-24 px-4">
    <div class="max-w-7xl mx-auto">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <h1 class="text-4xl font-bold mb-6"><?php the_title(); ?></h1>
                <div class="prose max-w-none">
                    <?php the_content(); ?>
                </div>
            </article>
        <?php endwhile; endif; ?>
    </div>
</div>

<?php get_footer(); ?>
