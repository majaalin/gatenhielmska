<?php

declare(strict_types=1);

add_action('init', function () {
    register_post_type('news', [
        'has_archive' => false,
        'labels' => [
            'add_new_item' => __('Add News'),
            'edit_item' => __('Edit Nrews'),
            'name' => __('News'),
            'search_items' => __('Search News'),
            'singular_name' => __('News'),
            'featured_image' => _('Featured Image'),
            'set_featured_image' => __('Set featured image'),
        ],
				'supports' => [
            'title',
            'editor',
            'thumbnail',
        ],
        'menu_icon' => 'dashicons-format-aside',
        'menu_position' => 20,
        'public' => true,
        'show_in_rest' => true,
        'taxonomies' => array('image')
    ]);
});

