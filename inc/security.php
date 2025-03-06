<?php

// Maintenance mode
/*
function activate_maintenance_mode() {
    if (!current_user_can('administrator') && !is_page('maintenance')) {
        wp_redirect(home_url('/maintenance/'));
        exit();
    }
}
add_action('template_redirect', 'activate_maintenance_mode');
*/

// Remove support for comments in posts and pages
function disable_comments_support() {
    remove_post_type_support('post', 'comments');
    remove_post_type_support('page', 'comments');
}
add_action('init', 'disable_comments_support');

// Remove comments menu from the admin dashboard
function remove_comments_admin_menu() {
    remove_menu_page('edit-comments.php');
}
add_action('admin_menu', 'remove_comments_admin_menu');

// Remove comments from the admin bar
function remove_comments_from_admin_bar($wp_admin_bar) {
    $wp_admin_bar->remove_node('comments');
}
add_action('admin_bar_menu', 'remove_comments_from_admin_bar', 999);

// Allow SVG uploads
function enable_svg_upload($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'enable_svg_upload');

// Validate SVG file type
function check_svg_filetype_and_ext($data, $file, $filename, $mimes) {
    $ext = pathinfo($filename, PATHINFO_EXTENSION);

    if ($ext === 'svg') {
        $data['ext'] = 'svg';
        $data['type'] = 'image/svg+xml';
    }

    return $data;
}
add_filter('wp_check_filetype_and_ext', 'check_svg_filetype_and_ext', 10, 4);