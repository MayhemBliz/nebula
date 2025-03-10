<?php get_header(null, ['has_hero' => true]); ?>

<?php get_template_part('blocks/hero/hero', null, [
    'title' => 'Search'
]); ?>

<main class="flex-1">

    <section class="py-20 bg-lightGrey">
        <div class="container">
            
            <div class="flex flex-col items-start md:flex-row md:items-center justify-between mb-12">

                <h2 class="text-4xl font-bold text-primary mb-6 md:mb-0">
                    <?php
                    printf(
                        esc_html__('Search Results for: %s', 'nebula'),
                        '<span class="text-primary">' . get_search_query() . '</span>'
                    );
                    ?>
                </h2>

                <form 
                    role="search" 
                    method="get" 
                    class="search-form flex items-center gap-2 min-w-full md:min-w-[320px]" 
                    action="<?php echo esc_url(home_url('/')); ?>"
                >
                    <input 
                        type="search" 
                        name="s" 
                        id="search-field"
                        value="<?php echo esc_attr(get_search_query()); ?>" 
                        placeholder="<?php esc_attr_e('Search...', 'nebula'); ?>" 
                        class="flex-1 p-3 border rounded outline-none focus:ring-2 focus:ring-primary"
                        aria-label="<?php esc_attr_e('Search for:', 'nebula'); ?>"
                    >
                    <button 
                        type="submit" 
                        class="p-3 bg-primary text-white rounded hover:bg-secondary transition"
                        aria-label="<?php esc_attr_e('Submit search', 'nebula'); ?>"
                    >
                        <?php // Add an icon or text for the button ?>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                        </svg>
                    </button>
                </form>

            </div>

            <?php if (have_posts()) : ?>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <?php while (have_posts()) : the_post(); ?>
                        <article class="flex flex-col gap-6 p-6 border rounded shadow bg-white">
                            <a href="<?php the_permalink(); ?>" class="text-xl font-semibold text-primary hover:text-secondary">
                                <?php the_title(); ?>
                            </a>
                            <div class="text-sm">
                            <?php 
                                if (has_excerpt()) {
                                    the_excerpt(); 
                                } else {
                                    echo wp_trim_words(strip_shortcodes(get_the_content()), 20, '...');
                                }
                            ?>
                            </div>
                        </article>
                    <?php endwhile; ?>
                </div>

                <div class="flex justify-center mt-8">
                    <?php the_posts_pagination(); ?>
                </div>

            <?php else : ?>
                <p>
                    <?php esc_html_e('Sorry, no results were found. Try a different search term.', 'nebula'); ?>
                </p>
            <?php endif; ?>
        </div>
    </section>

</main>

<?php get_footer(); ?>