<?php /* Template name: News */ ?>

<?php get_header(); ?>

<?php $news = get_posts(['post_type' => 'news']); ?>

<section class="news">
    <h2>Artiklar, Blogg, Nyheter</h2>
<?php if (count($news)): ?>
            <ul class="news-wrapper">
                <?php foreach ($news as $post): setup_postdata($post);?>
                    <li class="news-container">
                    <?php 
$image = get_field('image');
if( !empty( $image ) ): ?>
    <img class="news-img" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
<?php endif; ?>
<div class="text-container">
<h4 class="date">Publicerad: <?php the_field('date'); ?></h4>
                    <h3><a class="title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <!-- <p class="summary"><?php the_field('summary'); ?></p> -->
                    </div>
                <?php endforeach; ?>
            </ul>
<?php endif; ?>
</section>

<?php get_footer(); ?>
