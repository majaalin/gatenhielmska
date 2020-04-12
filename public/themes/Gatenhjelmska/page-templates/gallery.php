<?php /* Template name: Gallery */ ?>

<?php

// live for now:
/*
require get_theme_file_path('includes/app/instagramAPI/instagram_basic_display_api.php');

$accessToken = 'IGQVJWa3BNbU5JOVVveHZAzV3VULTZAabTVuVjZAoc3FxdXpobjQyUkpJMy1wbkUtd2k4VThKa1hqOXVRdzJkX01kd3NBdEZA5VDdORmQ1WG9adk8yaF93anJRcUsyQXIyZAVVVS2JteGpKeW1mY0xZAOU0wcwZDZD';

$params = array(
    'access_token' => $accessToken,
    'user_id' => '17841400619475331'
);
$ig = new instagram_basic_display_api($params);
$usersMedia = $ig->getUsersMedia();
*/


// Under development:
$file = get_theme_file_path('includes/app/instagramAPI/jsonData.txt');
$data = file_get_contents($file, true);
$usersMedia = json_decode($data, true);


?>

<?php get_header(); ?>
<section class="gallery" style="background-image:linear-gradient(0deg, rgba(100, 102, 106, 0.24), rgba(100, 102, 106, 0.24)), url('<?php bloginfo('template_directory'); ?>/assets/images/gallerybackground.jpeg');">
    <div class="gallery-wrapper">
        <h1>Galleriet</h1>
        <div class="gallery-container">
            <?php foreach ($usersMedia['data'] as $post) : ?>
                <div class="gallery-inner-container">
                    <?php if ('IMAGE' == $post['media_type'] || 'CAROUSEL_ALBUM' == $post['media_type']) : ?>
                        <img src="<?php echo $post['media_url']; ?>" />
                    <?php else : ?>
                        <video controls>
                            <source src="<?php echo $post['media_url']; ?>">
                        </video>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php get_footer(); ?>
