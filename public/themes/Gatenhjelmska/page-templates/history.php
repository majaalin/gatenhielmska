<?php /* Template name: History */ ?>

<?php get_header(); ?>

<?php $history = get_posts(array(
	'post_type'			=> 'history',
	'meta_key'			=> 'year',
	'orderby'			=> 'meta_value',
	'order'				=> 'ASC'
)); ?>

<section class="history">
<?php if (count($history)): ?>
            <ul class="history-wrapper">
                <?php for ($i = 0; $i < count($history); $i++) : $post = $history[$i];  setup_postdata($post);?>
                <?php if($i%2 == 0) : ?>
                    <li class="even">
                    <div>
                        <p class="year"><?php the_field('year'); ?></p>
                        <?php 
$image = get_field('image');
if( !empty( $image ) ): ?>
    <img class="history-img" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
<?php endif; ?>
                    </div>
                    <div>
                    <p class="title"><?php the_field('title'); ?></p>
                    <p class="content"><?php the_field('content'); ?></p>
                    </div>
</li>
                    <?php else : ?>
                        <li class="uneven">
                        <div>
                    <p class="title"><?php the_field('title'); ?></p>
                    <p class="content"><?php the_field('content'); ?></p>
                    </div>
                        <div>
                        <p class="year"><?php the_field('year'); ?></p>
                        <?php 
$image = get_field('image');
if( !empty( $image ) ): ?>
    <img class="history-img" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
<?php endif; ?>
                    </div>
                    </li>
                    <?php endif ?>
<?php endfor; ?> 
            </ul>
<?php endif; ?>
</section>
<?php get_footer(); ?>
