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

    $accessToken = 'EAACZCL1SXOZBwBADZCBhw3RwoZBVCgrDMLWaIavy6X7wSLKZCI6sXE8azjNZCdPBg7zEDA9GSvszMxWamwt21TpkrVZBvP0jxOEQPVjlGSnT2MNjjbYvGjtDR4DHGOnZAGkqk8fyogKuuojg7Fq0haMZCwhNxZA9b5cce7t67MpNZAQBBbNWlFb1B2WZBhkXbSx6TKHgIWLEI1uirOdD374t8D8T';

    $params = array(
        'access_token' => $accessToken
    );

    $fb = new Facebook_api($params);
    $data = $fb->_makeApiCall();

    return $data;
}

add_action('rest_api_init', function () {
    register_rest_route('wl/v1', 'facebook', [
        'methods' => 'GET',
        'callback' => 'wl_facebook',
    ]);
});
