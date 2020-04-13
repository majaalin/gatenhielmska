<?php /* Template name: Contact */ ?>

<?php get_header(); ?>
<section class="contact-info">
    <div class="contact-wrapper">
    <?php the_field('contact'); ?>
    <div class="info">
    <div class="wrapper">
                    <img src="<?php bloginfo('template_directory') ?>/assets/images/address.png" alt="">
                    <p><?php the_field('adress'); ?></p>
                    </div>
                    <div class="wrapper">
                    <img src="<?php bloginfo('template_directory') ?>/assets/images/email.png" alt="">
                    <p><?php the_field('mail'); ?></p>
                    </div>
                    <div class="wrapper">
                    <img src="<?php bloginfo('template_directory') ?>/assets/images/phone.png" alt="">
                    <p><?php the_field('tel'); ?></p>
                    </div>
                    </div>
                    <div class="opening">
                        <div class="wrapper">
                            <img src="<?php bloginfo('template_directory') ?>/assets/images/time.png" alt="">
                            <p><?php the_field('open-hours'); ?></p>
                    </div>
                    <div class="time">
                        <p><?php the_field('mon-fri') ?></p>
                        <p><?php the_field('sat') ?></p>
                        <p><?php the_field('sun') ?></p>
                    </div>
    </div>
</section>
<?php get_footer(); ?>
