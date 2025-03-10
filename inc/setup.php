<?php

// Enable various theme features
function theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    add_theme_support('menus');
    add_theme_support('editor-styles'); // Enable block editor styles
    add_editor_style('style.css'); // Add block editor styling
}
add_action('after_setup_theme', 'theme_setup');

// Disable the admin bar for all users
add_filter('show_admin_bar', '__return_false');

// Rename posts to news
function rename_post_menu_item() {
    global $menu;

    $menu[5][0] = 'Insights';
}
add_action('admin_menu', 'rename_post_menu_item');

// Enable excerpt support for pages
function add_excerpt_support_for_pages() {
    add_post_type_support('page', 'excerpt');
}
add_action('init', 'add_excerpt_support_for_pages');

// Register navigation menus
function register_menus() {
    register_nav_menus(
        array(
            'top' => __( 'Top Menu' ),
            'primary' => __( 'Primary Menu' ),
            'services' => __( 'Services Menu' ),
            'policies' => __( 'Policies Menu' )
        )
    );
}
add_action( 'init', 'register_menus' );