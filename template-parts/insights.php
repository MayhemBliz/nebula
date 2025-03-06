<section class="py-20 bg-lightGrey">
    <div class="container">
        <h2 class="text-4xl font-bold text-primary mb-12">
            <?php echo esc_html($args['title'] ?? 'Insights'); ?>
        </h2>
    </div>
    <div class="container grid grid-cols-1 md:grid-cols-3 gap-6">
    <?php

    // Check if categories are provided
    $category_query = !empty($args['categories']) ? implode(',', $args['categories']) : '';

    // Define query args
    $posts_query_args = [
        'post_type'      => 'post',
        'posts_per_page' => 3,
        'orderby'        => 'date',
        'order'          => 'DESC',
        'post__not_in'   => [get_the_ID()],
    ];

    // Only filter by category if categories exist (for single post)
    if (!empty($category_query)) {
        $posts_query_args['category_name'] = $category_query;
    }

    // Run the query
    $posts_query = new WP_Query($posts_query_args);

    if ($posts_query->have_posts()) :
        while ($posts_query->have_posts()) : $posts_query->the_post(); ?>
            <div class="news-tile bg-white shadow-lg">
                <?php if (has_post_thumbnail()): ?>
                    <a href="<?php the_permalink(); ?>">
                        <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title_attribute(); ?>" class="mx-auto w-full h-auto">
                    </a>
                <?php endif; ?>
                <div class="p-6">
                    <div class="mb-4 text-secondary font-bold">
                        <?php echo get_the_category_list(', '); ?>
                    </div>
                    <h3 class="text-xl font-bold mb-6">
                        <a href="<?php the_permalink(); ?>" class="text-primary hover:underline"><?php the_title(); ?></a>
                    </h3>
                    <p class="text-gray-500 text-sm mb-2"><?php echo get_the_date(); ?></p>
                    <p class="text-gray-600 mb-4"><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                </div>
            </div>
        <?php endwhile;
        wp_reset_postdata();
    else : ?>
        <p class="text-center col-span-3">No insights found.</p>
    <?php endif; ?>
    </div>
</section>