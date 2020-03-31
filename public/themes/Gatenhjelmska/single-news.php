<?php get_header(); ?>


      <?php if (have_posts()): ?>
      
          <?php while (have_posts()): the_post(); ?>
          <section class="single-news">
            <div class="background-light-gray"></div>
          <p class="date">Publicerad <?php the_field('date'); ?></p>
          <h1><?php the_title(); ?></h1>
          <p class="summary"><?php the_field('summary'); ?></p>
          <?php 
$image = get_field('image');
if( !empty( $image ) ): ?>
    <img class="news-img" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
    <span><?php echo esc_attr($image['caption']); ?></span>
<?php endif; ?>
<div class="content">
<?php the_field('content') ?>
</div>
</section>          
          <?php endwhile; ?>

      <?php endif; ?>

<div class="related"> 
<a href="">Alla ariklar</a>
<p>Relaterade artiklar</p> 
<div class="related-wrapper">
<?php $news = get_posts(['post_type' => 'news']); ?>
<?php if (count($news)): ?>
            <ul class="related-news-wrapper">
              <?php for ($i=0; $i < 3; $i++) : ?>
                <li class="related-news-container">
                    <?php 
$image = get_field('image');
if( !empty( $image ) ): ?>
    <img class="related-news-img" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
<?php endif; ?>
<div class="text-container">
<p class="date">Publicerad: <?php the_field('date'); ?></p>
                    <a class="title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    <p class="summary"><?php the_field('summary'); ?></p>
                    </div>
            </ul>
              <?php endfor ?>
<?php endif; ?>
</div>     
</div>  
      
<?php get_footer(); ?>