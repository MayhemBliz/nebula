<?php

$type = get_field('hero_type') ?: (isset($args['type']) ? $args['type'] : 'image');

global $post;
$current_id = isset($post->ID) ? $post->ID : null;

?>

<section class="hero relative <?php echo (($current_id === (int)get_option('page_on_front')) ? 'h-90vh' : 'min-h-500'); 
?> flex items-center pt-60 pb-6 lg:pb-20 overflow-hidden">
        <div class="relative container z-10 h-full flex flex-col">
            <div class="flex flex-col h-full items-center">
                <div class="flex w-full h-full items-center">
                    <div class="flex flex-col min-w-1/2">
                        <?php if (!empty($args['title']) || get_field('hero_title')): ?>
                            <h1 class="text-4xl lg:text-6xl font-bold text-white <?php echo (!empty(get_field('hero_summary')) || !empty(get_field('hero_link'))) ? 'mb-8' : ''; ?>"><?php echo esc_html($args['title'] ?? get_field('hero_title') ?? get_the_title()); ?></h1>
                        <?php endif; ?>
                        <?php if (!empty($args['summary']) || get_field('hero_summary')): ?>
                            <p class="text-lg text-white block mb-8"><?php echo nl2br(esc_html($args['summary'] ?? get_field('hero_summary') ?: get_the_excerpt())); ?></p>
                        <?php endif; ?>
                        <?php 
                        $link = get_field('link'); 
                        if ($link && isset($link['url']) && isset($link['title'])): ?>
                            <a href="<?php echo esc_url($link['url']); ?>" class="bg-secondary text-white px-8 py-3 rounded hover:bg-secondary transition w-auto self-start">
                                <?php echo esc_html($link['title']); ?>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    <div class="absolute inset-0 w-full h-full">
        <?php if ($type === 'image') { ?>
            <img class="object-cover w-full h-full grayscale" 
                 src="<?php echo esc_url($args['image'] ?? get_field('hero_image') ?: get_theme_file_uri('/images/hero-placeholder.jpg')); ?>" 
                 alt="<?php echo esc_html($args['title'] ?? get_field('hero_title') ?? 'Hero Image'); ?>">
        <?php } elseif ($type === 'video') { ?>
            <video class="object-cover w-full h-full grayscale" autoplay loop muted playsinline>
                <source src="<?php echo esc_url(get_field('hero_video')); ?>" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        <?php } ?>
    </div>
</section>