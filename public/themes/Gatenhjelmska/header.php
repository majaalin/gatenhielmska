<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="theme-color" content="#6d9aea">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <header class="desktop">
        <?php
        $custom_logo_id = get_theme_mod('custom_logo');
        $image = wp_get_attachment_image_src($custom_logo_id, 'full');
        ?>
        <img class="logo" src="<?php echo $image[0]; ?>" alt="">
        <?php wp_nav_menu(['theme_location' => 'navigation']); ?>
    </header>
    <header class="mobile">
        <img class="logo" src="<?php echo $image[0]; ?>" alt="">
        <div class="nav-icon">
            <div></div>
        </div>
    </header>
