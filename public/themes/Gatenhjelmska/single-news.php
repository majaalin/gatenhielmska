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
<a class="more" href="http://localhost:1337/news/">Alla ariklar</a>
<h3>Relaterade artiklar</h3> 
<div class="related-wrapper">
<?php $news = get_posts(['post_type' => 'news']); ?>
<?php if (count($news)): ?>
            <ul class="related-news-wrapper">
               <?php foreach(array_slice($news, 0, 3) as $new ) : setup_postdata($post)?>
                <li class="related-news-container">
                <a href="<?php echo $new->guid ?>"><span class="link-spanner"></span></a>
                    <?php 
$image = get_field('image');
if( !empty( $image ) ): ?>
    <img class="related-news-img" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
<?php endif; ?>
<div class="text-container">
<p class="date">Publicerad: <?php echo $new->post_date ?></p>
                    <h4><a class="title" href="<?php the_permalink(); ?>"><?php echo $new->post_title ?></a></h4>
                    </div>
              <?php endforeach ?>
<?php endif; ?>
</ul>
</div>     
</div>  
      
<?php get_footer(); ?>