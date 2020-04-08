<?php

declare(strict_types=1);

add_action('init', function () {
    register_post_type('history', [
        'has_archive' => false,
        'labels' => [
            'add_new_item' => __('Add New History'),
            'edit_item' => __('Edit History'),
            'name' => __('History'),
            'search_items' => __('Search History'),
            'singular_name' => __('History'),
            'featured_image' => _('Featured Image'),
            'set_featured_image' => __('Set featured image'),
        ],
        'supports' => [
            'title',
            'editor',
            'thumbnail',
        ],
        'menu_icon' => 'dashicons-welcome-learn-more',
        'menu_position' => 20,
        'public' => true,
        'show_in_rest' => true,
        'taxonomies' => array('image'),
    ]);
});
