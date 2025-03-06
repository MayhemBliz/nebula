<?php

/**
 * @package    Nebula
 * @author     Sean Palmer
 * @license    MIT
 * @link       https://github.com/mayhembliz/nebula
 * @since      1.0
*/

$theme_includes = [
    'inc/setup.php',
    'inc/security.php',
    'inc/acf.php',
    'inc/scripts.php',
];

foreach ($theme_includes as $file) {
    if (file_exists(get_theme_file_path() . '/' . $file)) {
        require_once get_theme_file_path() . '/' . $file;
    }
}

// ACF Blocks
if (file_exists(get_theme_file_path() . '/acf/acf_blocks.php')) {
    require_once get_theme_file_path() . '/acf/acf_blocks.php';
}