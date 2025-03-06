<?php get_header(); ?>

<?php get_template_part('blocks/hero/hero', null, array('variation' => 'narrow')); ?>

<main class="flex-1">

    <div class="breadcrumbs py-3 border-b border-grey ">
        <div class="container">
            <a class="text-primary font-bold underline" href="/insights">Insights</a> »
            <span class="text-primary font-bold"><?php the_title(); ?></span>
        </div>
    </div>

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <article class="py-20" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="mx-auto px-6 max-w-[800px]">
                <h1 class="text-4xl font-bold text-primary mb-12"><?php the_title(); ?></h1>
                <div class="post-categories mb-12 text-m text-secondary font-bold">
                    <?php echo get_the_category_list(', '); ?>
                </div>
                <div class="post-content"><?php the_content(); ?></div>
            </div>
        </article>
    <?php endwhile; else : ?>
        <p>No content found</p>
    <?php endif; ?>

    <?php 
        $categories = get_the_category();
        $category_slugs = !empty($categories) ? wp_list_pluck($categories, 'slug') : [];

        get_template_part('template-parts/insights', null, [
            'title' => 'Related Insights',
            'categories' => $category_slugs, // Pass all category slugs
        ]); 
    ?>
    
</main>

<?php get_footer(); ?>