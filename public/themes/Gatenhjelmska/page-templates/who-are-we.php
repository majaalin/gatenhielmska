<?php /* Template name: Who Are We*/ ?>

<?php get_header(); ?>
<section class="who-are-we">
    <div>
        <div>
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <h1><?php the_title(); ?></h1>
                    <?php the_content(); ?>
                <?php endwhile; ?>
            <?php endif; ?>
        </div><!-- /col -->
    </div><!-- /row -->
</section>
<?php get_footer(); ?>