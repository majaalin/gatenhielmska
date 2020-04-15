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

    $accessToken = 'EAACZCL1SXOZBwBAK8zbS0IroOzIYZAp6QDWllSY4yoqi8sIy0X2CPYYUO8b81pUr8hPqvqEUCZA2g82S6xYZB5fjHaIZBFR9ss0oeh469a1LMuJmErCFcGGzipnNc6KLQ5GWacuxOEWmZClglIjivgw06BjSnlU7YJnWynwld0xnXdxnMqREt39PbqtSJJCccvv14e4EMMLpSCNm5OkXtrS

    ';

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
