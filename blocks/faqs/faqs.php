<?php

// Get FAQ category filter (optional)
$faq_category = get_field('faq_category'); // Assume an ACF dropdown selecting a category

$args = array(
    'post_type'      => 'faq',
    'posts_per_page' => -1,
    'orderby'        => 'menu_order',
    'order'          => 'ASC',
    'tax_query'      => array(
        array(
            'taxonomy' => 'faq_category',
            'field'    => 'term_id', // Matching by category ID
            'terms'    => $faq_category, // Filter by the selected category
        ),
    ),
);

// If a category is set, filter by it
if ($faq_category) {
    $args['tax_query'] = array(
        array(
            'taxonomy' => 'faq_category',
            'field'    => 'term_id',
            'terms'    => $faq_category,
        ),
    );
}

$faq_query = new WP_Query($args);
$faq_schema = [];

if ($faq_query->have_posts()) :
?>
    <section id="<?php echo esc_attr(get_field('anchor') ?: ''); ?>" class="py-20 <?php echo esc_attr(get_field('background_colour') ?: 'bg-white'); ?>">
        <div class="flex flex-col gap-6 container max-w-[800px] text-center pb-20">
            <span class="uppercase font-bold tracking-widest"><?php echo esc_html(get_field('faq_section_label') ?: 'FAQs'); ?></span>
            <h2 class="text-4xl font-bold text-primary"><?php echo esc_html(get_field('faq_section_heading') ?: 'Frequently Asked Questions'); ?></h2>
            <?php if ($intro_text = get_field('faq_intro_text')) : ?>
                <div>
                    <p class="text-lg mb-0"><?php echo esc_html($intro_text); ?></p>
                </div>
            <?php endif; ?>
        </div>

        <div class="container">
            <div class="flex flex-col space-y-8">
                <ul class="space-y-4">

                    <?php while ($faq_query->have_posts()) : $faq_query->the_post(); 
                        $question = get_field('question', get_the_ID()); 
                        $answer = get_field('answer', get_the_ID());
                        $faq_category= get_field('faq_category', get_the_ID());

                        // Ensure fields are not empty before displaying
                        if ($question && $answer):
                            $faq_schema[] = [
                                "@type" => "Question",
                                "name" => $question,
                                "acceptedAnswer" => [
                                    "@type" => "Answer",
                                    "text" => wp_strip_all_tags($answer)
                                ]
                            ];
                    ?>
                        <li class="faq-item pb-4">
                            <h4 class="faq-header shadow-lg p-6 hover:cursor-pointer hover:bg-primary hover:text-white flex justify-between items-center transition"
                                onclick="toggleFAQ(this)">
                                <?php echo esc_html($question); ?>
                                <span class="faq-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" class="bi bi-plus" viewBox="0 0 16 16">
                                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                                    </svg>
                                </span>
                            </h4>
                            <div class="faq-content hidden p-6">
                                <p class="mb-0"><?php echo esc_html($answer); ?></p>
                            </div>
                        </li>
                    <?php endif; endwhile; ?>
                </ul>
            </div>
        </div>
    </section>

    <?php if (!empty($faq_schema)) : ?>
        <script type="application/ld+json">
            <?php echo json_encode([
                "@context" => "https://schema.org",
                "@type" => "FAQPage",
                "mainEntity" => $faq_schema
            ], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT); ?>
        </script>
    <?php endif; ?>

<?php endif; wp_reset_postdata(); ?>