<?php

declare(strict_types=1);

// Register plugin helpers.
require get_theme_file_path('includes/plugins/plate.php');
require get_template_directory() . '/post-types/news.php';
require get_template_directory() . '/post-types/members.php';
require get_template_directory() . '/post-types/history.php';

// Set theme defaults.
add_action('after_setup_theme', function () {
    // Disable the admin toolbar.
    show_admin_bar(false);

    // Add post thumbnails support.
    add_theme_support('post-thumbnails');

    // Add custom logo support.
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
    ));

    // Add title tag theme support.
    add_theme_support('title-tag');

    // Add HTML5 theme support.
    add_theme_support('html5', [
        'caption',
        'comment-form',
        'comment-list',
        'gallery',
        'search-form',
        'widgets',
    ]);

    // Register navigation menus.
    register_nav_menus([
        'navigation' => __('Navigation', 'wordplate'),
    ]);
});

// Remove JPEG compression.
add_filter('jpeg_quality', function () {
    return 100;
}, 10, 2);

add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('style', get_stylesheet_directory_uri() . '/assets/styles/app.css');
    wp_enqueue_script('script', get_template_directory_uri() . '/assets/scripts/app.js');
});