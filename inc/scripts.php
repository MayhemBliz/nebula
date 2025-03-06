<?php

// Enqueue Tailwind CSS & other styles
function theme_enqueue_styles() {
    wp_enqueue_style('theme-style', get_stylesheet_uri()); // Default WP style.css
    wp_enqueue_style('tailwind', get_template_directory_uri() . '/style.css'); // Tailwind styles
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
    wp_enqueue_style('block-editor-styles', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('updates', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap');
}
add_action('enqueue_block_editor_assets', 'my_theme_editor_enqueue');