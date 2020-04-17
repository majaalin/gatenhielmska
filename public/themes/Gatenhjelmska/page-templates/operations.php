<?php /* Template name: Verksamhet */ ?>

<?php get_header(); ?>
<section class="operations">
    <div class="house" style="background: linear-gradient(0deg, rgba(25, 29, 35, 0.8), rgba(25, 29, 35, 0.8)), url(<?php bloginfo('template_directory') ?>/assets/images/house.png); background-attachment: fixed; background-size: cover; background-position: center;">
        <div class="house-wrapper"><?php the_field('house'); ?></div>
    </div>
    <div class="section-heding">
        <div>
            <h2>Verksamheter</h2>
        </div>
    </div>
    <div class="operations-div" style="background: linear-gradient(0deg, rgba(25, 29, 35, 0.8), rgba(25, 29, 35, 0.8)), url(<?php bloginfo('template_directory') ?>/assets/images/operations.png); background-attachment: fixed; background-size: cover; background-position: center;">
        <div class="operations-wrapper"><?php the_field('operations'); ?></div>
    </div>
    </div>
</section>
<?php get_footer(); ?>
