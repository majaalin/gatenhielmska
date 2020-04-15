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
        <div class="wrapper">
            <?php
                $custom_logo_id = get_theme_mod('custom_logo');
                $image = wp_get_attachment_image_src($custom_logo_id, 'full');
            ?>

<a class="logo" href="http://localhost:1337"><img src="<?php echo $image[0]; ?>" alt="logo"></a>
            <?php wp_nav_menu(['theme_location' => 'navigation']); ?>
        </div>
    </header>
    <header class="mobile">
        <img class="logo" src="<?php echo $image[0]; ?>" alt="logo">
            <div class="nav-icon"></div>
                <div class="cross">
                    <img src="<?php bloginfo('template_directory') ?>/assets/images/cross.png" alt="cross">
                </div>
                <div class="mobile-menu">
                    <?php wp_nav_menu(['theme_location' => 'navigation']); ?>
            </div>
    </header>
