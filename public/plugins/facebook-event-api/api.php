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

    $accessToken = 'EAACZCL1SXOZBwBAJZATw8QBIWFWZAmbHjKbZC88dJ4tEOwy3G5ukOJsFvJJx6y5SGpDajANHLJPVGZCAg719Y76JBFfPyxyrgfI8EIXZCjGw5OYTkEp5bETZAFi36c2NTOSXtUP4bwyFA0grYBm12WrIOzmLlsUZCE8JRCJI1rNk0QaWPurZCL3Mmc6AtTL74s3hMZD';

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
