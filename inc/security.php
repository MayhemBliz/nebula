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

// Disable XML-RPC to prevent brute force attacks and exploits
add_filter('xmlrpc_enabled', '__return_false');

// Restrict REST API access to logged-in users
function restrict_rest_api_access($result) {
    if (!is_user_logged_in()) {
        return new WP_Error('rest_forbidden', __('REST API restricted to logged-in users.'), array('status' => 401));
    }
    return $result;
}
add_filter('rest_authentication_errors', 'restrict_rest_api_access');

// Disable theme and plugin file editing from the admin panel
define('DISALLOW_FILE_EDIT', true);
define('DISALLOW_FILE_MODS', true);

// Enforce Content Security Policy (CSP) headers
function add_csp_headers() {
    header("Content-Security-Policy: default-src 'self'; script-src 'self' 'unsafe-inline' 'unsafe-eval'; style-src 'self' 'unsafe-inline'; img-src 'self' data:;");
}
add_action('send_headers', 'add_csp_headers');

// Secure script enqueuing by disabling version numbers in URLs
function remove_version_strings($src) {
    return remove_query_arg('ver', $src);
}
add_filter('script_loader_src', 'remove_version_strings');
add_filter('style_loader_src', 'remove_version_strings');

// Sanitize and validate user inputs
function sanitize_custom_inputs($input) {
    return sanitize_text_field($input);
}
add_filter('sanitize_text_field', 'sanitize_custom_inputs');

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