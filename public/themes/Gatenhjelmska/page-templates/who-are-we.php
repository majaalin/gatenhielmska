<?php /* Template name: Vilka är vi*/ ?>

<?php get_header(); ?>
<section class="who-are-we" style="background: linear-gradient(0deg, rgba(25, 29, 35, 0.8), rgba(25, 29, 35, 0.8)), url(<?php bloginfo('template_directory') ?>/assets/images/who-are-we.png); background-attachment: fixed;">
    <div>
        <?php the_field('about'); ?>
    </div>
</section>
<?php get_footer(); ?>