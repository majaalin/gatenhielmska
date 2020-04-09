<?php
// change path as needed
realpath(__DIR__ . '/vendor/autoload.php');
require_once(plugin_dir_path(__DIR__) . 'facebook-event-api/defines.php');

class Facebook_api
{
    private $_userAccessToken = '';

    function __construct($params)
    {
        // get an access token
        $this->_setUserFacebookAccessToken($params);
    }

    private function _setUserFacebookAccessToken($params)
    {
        $this->_userAccessToken = $params['access_token'];
    }

    public function _makeApiCall()
    {
        $fb = new \Facebook\Facebook([
            'app_id' => FACEBOOK_APP_ID,
            'app_secret' => FACEBOOK_APP_SECRET,
            'default_graph_version' => 'v2.10',
            //'default_access_token' => '{access-token}', // optional
        ]);

        try {
            // Get the \Facebook\GraphNodes\GraphUser object for the current user.
            // If you provided a 'default_access_token', the '{access-token}' is optional.
            $response = $fb->get('/me?fields=events{name,count,cover,description,guest_list_enabled,owner,place,start_time,end_time,ticket_uri,ticket_uri_start_sales_time,category,attending_count}', $this->_userAccessToken);
        } catch (\Facebook\Exceptions\FacebookResponseException $e) {
            // When Graph returns an error
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch (\Facebook\Exceptions\FacebookSDKException $e) {
            // When validation fails or other local issues
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }

        $graphNode = $response->getGraphObject();
        $data = json_decode($graphNode, true);

        return $data;
    }
}
