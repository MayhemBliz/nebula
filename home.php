<?php get_header(); ?>

<?php get_template_part('blocks/hero/hero', null, [
    'title' => 'Insights',
    'summary' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ullamcorper ex lectus, quis viverra massa elementum vitae.',
    'image' => ''
]); ?>

<main class="flex-1">

    <section class="py-20 bg-lightGrey">
        <div class="container">
            <h2 class="text-4xl font-bold text-primary mb-12">Filter by</h2>

            <!-- Filter and Search Form -->
            <form id="filter-form" method="GET" class="inline-flex flex-col w-full md:w-auto md:flex-row bg-white border border-grey border-opacity-20 rounded p-3 mb-8 gap-3">

                <!-- Search Input -->
                <div class="flex gap-3 items-center bg-white p-3 lg:min-w-320">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#5A5A5A" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                    </svg>
                    <input type="text" name="industry-search" id="industry-search" 
                        value="<?php echo isset($_GET['industry-search']) ? esc_attr($_GET['industry-search']) : ''; ?>" 
                        class="text-grey rounded outline-none placeholder-grey" 
                        placeholder="Search Keyword...">
                </div>

                <div class="border-r border-grey border-opacity-20"></div>

                <!-- Category Filter -->
                <div class="flex items-center bg-white ml-3 lg:min-w-320">
                    <select name="category-filter" id="category-filter" class="text-grey p-2 rounded w-full">
                        <option value="">Select Category</option>
                        <?php
                        $terms = get_terms([
                            'taxonomy' => 'category',
                            'hide_empty' => true,
                        ]);
                        foreach ($terms as $term) {
                            $selected = (isset($_GET['category-filter']) && $_GET['category-filter'] === $term->slug) ? 'selected' : '';
                            echo "<option value='{$term->slug}' $selected>{$term->name}</option>";
                        }
                        ?>
                    </select>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="flex justify-center md:justify-left items-center bg-secondary gap-3 text-white px-8 py-3 rounded hover:bg-secondary transition ml-3">
                    Search
                </button>
            </form>

            <?php
            $category_filter = isset($_GET['category-filter']) ? sanitize_text_field($_GET['category-filter']) : '';
            $search_term = isset($_GET['search-term']) ? sanitize_text_field($_GET['search-term']) : '';

            // Query args
            $query_args = array(
                'post_type' => 'post',
                'posts_per_page' => 10,
                'orderby' => 'date',
                'order' => 'DESC',
                's' => $search_term,
            );

            // Filter by category if set
            if (!empty($category_filter)) {
                $query_args['tax_query'] = [
                    [
                        'taxonomy' => 'category',
                        'field'    => 'slug',
                        'terms'    => $category_filter,
                    ],
                ];
            }

            // Query posts
            $custom_query = new WP_Query($query_args);

            if ($custom_query->have_posts()) :
            ?>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <?php while ($custom_query->have_posts()) : $custom_query->the_post(); ?>
                        <div class="post-tile bg-white shadow-lg">
                            <?php if (has_post_thumbnail()): ?>
                                <a href="<?php the_permalink(); ?>">
                                    <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title_attribute(); ?>" class="mx-auto w-full h-auto">
                                </a>
                            <?php endif; ?>
                            <div class="p-6">
                                <h3 class="text-xl font-bold mb-6">
                                    <a href="<?php the_permalink(); ?>" class="text-primary hover:underline"><?php the_title(); ?></a>
                                </h3>
                                <p class="text-gray-500 text-sm mb-2"><?php echo get_the_date(); ?></p>
                                <p class="text-gray-600 mb-4"><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>

                <!-- Pagination -->
                <div class="mt-8">
                    <?php
                    echo paginate_links([
                        'total' => $custom_query->max_num_pages,
                        'prev_text' => '« Previous',
                        'next_text' => 'Next »',
                    ]);
                    ?>
                </div>

                <?php wp_reset_postdata(); ?>
            <?php else : ?>
                <p class="text-center col-span-3">No results found.</p>
            <?php endif; ?>
        </div>
    </section>

</main>

<?php get_footer(); ?>