<?php /* Template name: Home */ ?>

<?php $heroImage = get_field('hero_frontpage'); ?>
<?php get_header(); ?>
<section class="home">
    <div class="home-wrapper">
        <!-- first view on landing page  -->
        <div class="first-view">
            <!-- background IMG  -->
            <img class="hero-img" src="<?php echo $heroImage['image_']; ?>" alt="#">
            <!-- Header on first view -->
            <div class="header-container">
                <h1><?php echo $heroImage['hero_title']; ?></h1>
                <h2><?php echo $heroImage['hero_text_and_links_']; ?></h2>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>
