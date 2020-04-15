<?php

/**
 * Plugin Name: Facebook Event api
 * Description: Get an facebook user’s event data.
 * version: 1.0
 * Author: Andreas Pandzic
 */

function wl_facebook()
{
    // require get_theme_file_path('includes/app/facebookAPI/facebook_grap_api_events.php');
    require_once(plugin_dir_path(__DIR__) . 'facebook-event-api/facebook_grap_api_events.php');

    $accessToken = 'EAACZCL1SXOZBwBABwhxOZBQZBuBRmFnVmPfxIQDfhomzZBoDvrNWuSZAJYIXPztodAOuaVX5oOl77kmpeHZBLWIj6hM8owZAr0VFKDPF54ij9wsxfQMWMhGqlSey3vuUw6mvsvD2zpVTcdpjT9sCfSONtZChMsZCOym1xa8rJy5dzCKckfejIZBHg6dxCQ52YAwZAgkXu7ugpwQqPLzA5HQvo2iG';

    $params = array(
        'access_token' => $accessToken
    );

    $fb = new Facebook_api($params);
    $data = $fb->_makeApiCall();
    $dataReverse = array_reverse($data['events']);

    return $dataReverse;
}

add_action('rest_api_init', function () {
    register_rest_route('wl/v1', 'facebook', [
        'methods' => 'GET',
        'callback' => 'wl_facebook',
    ]);
});
