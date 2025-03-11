<?php

// Register blocks using block.json
function register_acf_blocks() {
    $blocks = glob(get_template_directory() . '/blocks/*', GLOB_ONLYDIR);
    
    foreach ($blocks as $block) {
        register_block_type($block);
    }
}
add_action('init', 'register_acf_blocks');

// Restrict allowed blocks to only your custom blocks
add_filter('allowed_block_types_all', 'cc_allow_only_custom_blocks', 10, 2);
function cc_allow_only_custom_blocks($allowed_blocks, $editor_context) {
    // List of allowed custom blocks
    $custom_blocks = array(
        // Custom ACF blocks
        'acf/button',
        'acf/faqs',
        'acf/hero',
        'acf/logos',
        'acf/quotes',
        'acf/section',
        
        'core/columns',
        'core/paragraph',
        'core/heading',
        'core/image',
        'core/list',
        'core/list-item',
        'core/gallery',
        'core/button',
        'core/embed',
        'core/shortcode'
    );

    // Check if we are in the post editor context
    if (!empty($editor_context->post)) {
        return $custom_blocks;
    }

    // Return the original allowed blocks if not in post editor context
    return $allowed_blocks;
}

// Default blocks for pages
function register_page_template() {
    // Block template for new Pages
    $block_template = [
        ['acf/hero', []],
        ['acf/section', []],
    ];

    // Modify the 'page' post type to include this block template
    $post_type_args = get_post_type_object('page');
    if ($post_type_args) {
        $post_type_args->template = $block_template;
    }
}
add_action('init', 'register_page_template');

// Load ACF JSON from theme
add_filter('acf/settings/load_json', function($paths) {
    $paths[] = get_template_directory() . '/acf-json';
    return $paths;
});