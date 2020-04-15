<?php /* Template name: Kontakt */ ?>

<?php get_header(); ?>
<section class="contact-info">
    <div class="contact-wrapper">
        <?php the_field('heading-and-paragraf'); ?>
        <div class="info">
            <div class="wrapper">
                <img src="<?php bloginfo('template_directory') ?>/assets/images/address.png" alt="adress">
                <p><?php the_field('address'); ?></p>
            </div>
            <div class="wrapper">
                <img src="<?php bloginfo('template_directory') ?>/assets/images/email.png" alt="email">
                <p><?php the_field('email'); ?></p>
            </div>
            <div class="wrapper">
                <img src="<?php bloginfo('template_directory') ?>/assets/images/phone.png" alt="phone">
                <p><?php the_field('number'); ?></p>
            </div>
        </div>
        <div class="opening">
            <div class="wrapper">
                <img src="<?php bloginfo('template_directory') ?>/assets/images/time.png" alt="time">
                <p><?php the_field('sub-header'); ?></p>
            </div>
            <div class="time">
                <p><?php the_field('monday-friday') ?></p>
                <p><?php the_field('saturday') ?></p>
                <p><?php the_field('sunday') ?></p>
            </div>
    </div>
</section>
<?php get_footer(); ?>
