<?php /* Template name: News */ ?>

<?php get_header(); ?>

<?php $news = get_posts(['post_type' => 'news']); ?>

<section class="news">
    <h1>Artiklar, Blogg, Nyheter</h1>
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
<p>Publicerad: <?php the_field('date'); ?></p>
                    <p><?php the_title(); ?></p>
                    <p><?php the_field('summary'); ?></p>
                    </div>
                <?php endforeach; ?>
            </ul>
<?php endif; ?>
</section>

<?php get_footer(); ?>
