<?php get_header(); ?>

<main class="flex-1">

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <?php the_content(); ?>
    <?php endwhile; else : ?>
        <p>No content found</p>
    <?php endif; ?>

    <?php get_template_part('template-parts/insights'); ?>
    
</main>

<?php get_footer(); ?>