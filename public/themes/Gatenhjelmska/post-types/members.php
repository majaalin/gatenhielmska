<?php

declare(strict_types=1);

add_action('init', function () {
    register_post_type('member', [
        'has_archive' => true,
        'labels' => [
            'add_new_item' => __('Add New Member'),
            'edit_item' => __('Edit Member'),
            'name' => __('Member'),
            'search_items' => __('Search Member'),
            'singular_name' => __('Member'),
            'featured_image' => _('Featured Image'),
            'set_featured_image' => __('Set featured image'),
        ],
				'supports' => [
            'title',
            'editor',
            'thumbnail',
        ],
        'menu_icon' => 'dashicons-groups',
        'menu_position' => 20,
        'public' => true,
        'show_in_rest' => true,
        'taxonomies' => array('image'),
    ]);
});

