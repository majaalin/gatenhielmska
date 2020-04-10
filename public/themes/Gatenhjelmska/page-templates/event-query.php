<?php /* Template name: Events Query */ ?>

<?php get_header(); ?>
<section class="event-query">
<img class="background-img" src="<?php bloginfo('template_directory') ?>/assets/images/event-query.png" alt="">
        <div class="contact-form">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <h1><?php the_field('h1'); ?></h1>
                    <p><?php the_field('paragraf'); ?></p>
                    <?php the_content(); ?>
                    <?php endwhile; ?>
            <?php endif; ?>
                </div>
                <div class="contact"> 
                    <h2><?php the_field('h2'); ?></h2>
                    <div class="wrapper">
                    <img src="<?php bloginfo('template_directory') ?>/assets/images/address.png" alt="">
                    <p><?php the_field('address'); ?></p>
                    </div>
                    <div class="wrapper">
                    <img src="<?php bloginfo('template_directory') ?>/assets/images/email.png" alt="">
                    <p><?php the_field('email'); ?></p>
                    </div>
                    <div class="wrapper">
                    <img src="<?php bloginfo('template_directory') ?>/assets/images/phone.png" alt="">
                    <p><?php the_field('phone'); ?></p>
                    </div>
                    <div class="wrapper socialmedia">
                    <img src="<?php bloginfo('template_directory') ?>/assets/images/facebook.png" alt="">
                    <img src="<?php bloginfo('template_directory') ?>/assets/images/facebook.png" alt="">
                    <img src="<?php bloginfo('template_directory') ?>/assets/images/facebook.png" alt="">
                    </div>
                </div>
        </section>
<?php get_footer(); ?>
