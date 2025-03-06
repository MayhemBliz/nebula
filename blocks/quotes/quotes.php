<section class="relative py-20 bg-lightGrey">
    <div class="container">
        <!-- Swiper slider main container -->
        <div class="swiper-container">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper mb-20">
                <?php
                // Query the 'quote' posts.
                $quotes_query = new WP_Query([
                    'post_type'      => 'quote',
                    'posts_per_page' => 5,
                ]);

                if ($quotes_query->have_posts()) :
                    while ($quotes_query->have_posts()) : 
                        $quotes_query->the_post();
                        // Retrieve custom fields or fallback values.
                        $quote_text   = get_field('quote', get_the_ID()) ? get_field('quote', get_the_ID()) : get_the_content();
                        $quote_author = get_field('author', get_the_ID()) ? get_field('author', get_the_ID()) : get_the_title();
                        $author_job_title = get_field('author_job_title', get_the_ID());
                        $author_company = get_field('author_company', get_the_ID());

                        ?>
                        <div class="swiper-slide">
                            <blockquote class="text-4xl text-black-50 mb-8">
                                <?php echo wp_kses_post($quote_text); ?>
                            </blockquote>
                            <div class="flex items-center">
                                <i class="p-6 hidden">
                                    <img src="<?php echo get_theme_file_uri('/icons/quote.svg'); ?>" alt="Quote" class="w-12 h-12">
                                </i>
                                <div class="flex flex-col">
                                    <cite class="block not-italic"><?php echo esc_html($quote_author); ?></cite>
                                    <?php if ($author_company): ?>
                                        <span class="block"><?php echo esc_html($author_company); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endwhile;
                    wp_reset_postdata();
                else : ?>
                    <p class="text-center">No quotes found.</p>
                <?php endif; ?>
            </div>
            <div class="swiper-controls flex gap-3 items-center">
                <div class="swiper-button-prev-custom bg-primary hover:bg-secondary transition duration-300 flex items-center justify-center h-12 w-12">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#ffffff" class="bi bi-arrow-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8"/>
                    </svg>
                </div>
                <div class="swiper-button-next-custom bg-primary hover:bg-secondary transition duration-300 flex items-center justify-center h-12 w-12">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#ffffff" class="bi bi-arrow-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/>
                    </svg>
                </div>
                <div class="swiper-pagination-custom p-6 font-bold"></div>
            </div>
        </div>
    </div>
</section>