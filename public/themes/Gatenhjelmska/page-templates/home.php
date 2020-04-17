<?php /* Template name: Start */ ?>

<?php $heroImage = get_field('hero_frontpage'); ?>

<?php get_header(); ?>

<section class="home">
    <div class="home__wrapper">
        <!-- first view on landing page  -->
        <div class="home__first-view">
            <!-- background IMG  -->
            <img class="home__hero-img" src="<?php echo $heroImage['image_']; ?>" alt="image">
            <!-- Header on first view -->
            <div class="home__header">
                <div class="home__header-container"></div>
                <div class="home__header-container">
                    <h1 class="home__desktop"><?php echo $heroImage['hero_title']; ?></h1>
                    <h1 class="home__mobile"><?php echo $heroImage['hero_title_copy']; ?></h1>
                    <h2><?php echo $heroImage['hero_text_and_links_']; ?></h2>
                </div>
                <div class="home__header-container">
                    <div class="home__header-container-inner">
                        <h3>KOMMANDE EVENT</h3>
                        <div class="home__arrow-button">
                            <a class="homeScrollButton" href="#anchor1"><img src="<?php bloginfo('template_directory') ?>/assets/images/down-arrow-white.png" /></a>
                            <div id="anchor1"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-outer">
            <div class="modal-inner"></div>
        </div>
        <div class="events__wrapper">
            <div class="events__secound-view">
                <div class="event-container"></div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
