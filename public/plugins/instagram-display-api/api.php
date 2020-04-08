<?php

/**
 * Plugin Name: Instagram Basic api
 * Description: Get an Instagram user’s images, videos, and albums
 * version: 1.0
 * Author: Andreas Pandzic
 */

function wl_instagram()
{
    require_once(plugin_dir_path(__DIR__) . 'instagram-display-api/instagram_basic_display_api.php');

    $accessToken = 'IGQVJWa3BNbU5JOVVveHZAzV3VULTZAabTVuVjZAoc3FxdXpobjQyUkpJMy1wbkUtd2k4VThKa1hqOXVRdzJkX01kd3NBdEZA5VDdORmQ1WG9adk8yaF93anJRcUsyQXIyZAVVVS2JteGpKeW1mY0xZAOU0wcwZDZD';

    $params = array(
        'access_token' => $accessToken,
        'user_id' => '17841400619475331'
    );

    $ig = new instagram_basic_display_api($params);
    $data = $ig->getUsersMedia();

    return $data;
}

add_action('rest_api_init', function () {
    register_rest_route('wl/v1', 'instagram', [
        'methods' => 'GET',
        'callback' => 'wl_instagram',
    ]);
});
