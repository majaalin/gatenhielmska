<?php get_header(); ?>


      <?php if (have_posts()): ?>
      
          <?php while (have_posts()): the_post(); ?>
          <section class="single-news">
          <p class="date">Publicerad <?php the_field('date'); ?></p>
          <h1><?php the_title(); ?></h1>
          <p class="summary"><?php the_field('summary'); ?></p>
          <?php 
$image = get_field('image');
if( !empty( $image ) ): ?>
    <img class="news-img" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
<?php endif; ?>
<div class="content">
<?php the_field('content') ?>
</div>

</section>

              
            
          <?php endwhile; ?>

      <?php endif; ?>
      
<?php get_footer(); ?>