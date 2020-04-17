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

    $accessToken = 'IGQVJVSENkSW1CM19abzBOMER3djZAZAWlRmU0s5bm56R1k1ZAFRDYTJoLXBNQVVEeGRJeE5mV3lDZAFN3VVJ4M0xPTjJVbG9TY1RGRXdaTGFBc3dLQkZAsQ2RsSFZAJNjNORTNSX2dZAREVn';

    $params = array(
        'access_token' => $accessToken,
        'user_id' => '17841428809878118'
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
