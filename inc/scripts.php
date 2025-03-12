<?php

// Enqueue Tailwind CSS & other styles
function theme_enqueue_styles() {
    $version = filemtime(get_template_directory() . '/style.css');

    wp_enqueue_style('theme-style', get_stylesheet_uri(), [], $version);
    wp_enqueue_style('tailwind', get_template_directory_uri() . '/style.css', [], $version);
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap');
}
add_action('wp_enqueue_scripts', 'theme_enqueue_styles');

// Automatically Enqueue All JavaScript Files in `/js/`
function theme_enqueue_scripts() {
    $js_directory = get_template_directory() . '/js/';
    $js_url = get_template_directory_uri() . '/js/';

    // Scan the `/js/` directory for all `.js` files
    foreach (glob($js_directory . '*.js') as $file) {
        $file_name = basename($file, ".js"); // Get the file name without extension
        wp_enqueue_script($file_name, $js_url . $file_name . '.js', [], null, true);
    }

    // Localize script to pass AJAX data to JavaScript
    wp_localize_script('main', 'ajax_params', [
        'ajax_url' => admin_url('admin-ajax.php'),
    ]);
}
add_action('wp_enqueue_scripts', 'theme_enqueue_scripts');

// Enqueue styles for block editor
function my_theme_editor_enqueue() {
    $version = filemtime(get_template_directory() . '/style.css');

    wp_enqueue_style('block-editor-styles', get_template_directory_uri() . '/style.css', [], $version);
    wp_enqueue_style('updates', get_template_directory_uri() . '/style.css', [], $version);
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap');
}
add_action('enqueue_block_editor_assets', 'my_theme_editor_enqueue');

// Enqueue ACF block scripts
function enqueue_acf_block_scripts() {
    if (!is_singular()) {
        return; // Only enqueue scripts on singular pages (posts, pages, CPTs)
    }

    $blocks = glob(get_template_directory() . '/blocks/*', GLOB_ONLYDIR);
    $used_blocks = [];

    $post = get_post();
    if ($post) {
        $content = $post->post_content;

        foreach ($blocks as $block_dir) {
            $block_name = basename($block_dir);
            if (has_block("acf/{$block_name}", $post)) {
                $used_blocks[] = $block_name;
            }
        }
    }

    foreach ($used_blocks as $block_name) {
        $script_path = get_template_directory() . "/blocks/{$block_name}/edit.js";

        if (file_exists($script_path)) {
            wp_enqueue_script(
                "acf-block-{$block_name}-js",
                get_template_directory_uri() . "/blocks/{$block_name}/edit.js",
                array('jquery'),
                null,
                true
            );
        }
    }
}
add_action('wp_enqueue_scripts', 'enqueue_acf_block_scripts');
