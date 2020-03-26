<?php /* Template name: Om oss */ ?>

<?php get_header(); ?>

<section class="om-oss">
<div>
    <div>

      <?php if (have_posts()): ?>

          <?php while (have_posts()): the_post(); ?>

              <h1><?php the_title(); ?></h1>

              <?php the_content(); ?>

          <?php endwhile; ?>

      <?php endif; ?>

    </div><!-- /col -->
</div><!-- /row -->
</section>

<?php $members = get_posts(['post_type' => 'member']); ?>

<section class="members">
<?php if (count($members)): ?>
    <div>
        <div>
            <h2>Members</h2>
            <ul>
                <?php foreach ($members as $post): setup_postdata($post);?>
                    <li>
                    <div class="img-wrapper">
                    <?php 
$image = get_field('image');
if( !empty( $image ) ): ?>
    <img class="members-img" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
<?php endif; ?>
</div>
                    <p><?php the_title(); ?></p>
                    <p><?php the_field('fact'); ?></p>
                    <a href="mailto:<?php the_field('email'); ?>"><?php the_field('email'); ?></a>
                <?php endforeach; ?>
            </ul>
        </div><!-- /col -->
    </div><!-- /row -->
<?php endif; ?>
</section>

<?php $news = get_posts(['post_type' => 'news']); ?>

<section class="news">
<?php if (count($news)): ?>
    <div>
        <div>
            <h2>News</h2>
            <ul>
                <?php foreach ($news as $post): setup_postdata($post);?>
                    <li>
                    <p><?php the_field('date'); ?></p>
                    <div class="img-wrapper">
                    <?php 
$image = get_field('image');
if( !empty( $image ) ): ?>
    <img class="news-img" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
<?php endif; ?>
</div>
                    <p><?php the_title(); ?></p>
                    <p><?php the_field('text'); ?></p>
                <?php endforeach; ?>
            </ul>
        </div><!-- /col -->
    </div><!-- /row -->
<?php endif; ?>
</section>

<?php get_footer(); ?>