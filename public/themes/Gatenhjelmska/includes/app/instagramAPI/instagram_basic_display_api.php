<?php
require_once('defines.php');

class instagram_basic_display_api
{
    private $_graphBaseUrl = 'https://graph.instagram.com/';
    private $_userAccessToken = '';

    public $authorizationUrl = '';
    public $hasUserAccessToken = false;
    public $userId = '';

    function __construct($params)
    {
        // get an access token
        $this->_setUserInstagramAccessToken($params);
    }

    public function getUserAccessToken()
    {
        return $this->_userAccessToken;
    }


    private function _setUserInstagramAccessToken($params)
    {
        $this->_userAccessToken = $params['access_token'];
        $this->hasUserAccessToken = true;
        $this->userId = $params['user_id'];
    }


    public function getUsersMedia()
    {
        $params = array(
            'endpoint_url' => $this->_graphBaseUrl . $this->userId . '/media',
            'type' => 'GET',
            'url_params' => array(
                'fields' => 'id,caption,media_type,media_url',
            )
        );

        $pagin = false;

        $response = $this->_makeApiCall($params, $pagin);
        return $response;
    }

    public function getPaging($pagingEndpoint)
    {
        $params = array(
            'endpoint_url' => $pagingEndpoint,
            'type' => 'GET',
            'url_params' => array(
                'paging' => true
            )
        );

        $pagin = true;

        $response = $this->_makeApiCall($params, $pagin);
        return $response;
    }

    private function _makeApiCall($params, $pagin)
    {
        $ch = curl_init();

        $endpoint = $params['endpoint_url'];

        if ('POST' == $params['type']) { // post request
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params['url_params']));
            curl_setopt($ch, CURLOPT_POST, 1);
        } elseif ('GET' == $params['type'] && !$pagin) { // get request
            $params['url_params']['access_token'] = $this->_userAccessToken;

            //add params to endpoint
            $endpoint .= '?' . http_build_query($params['url_params']);
        }

        // general curl options
        curl_setopt($ch, CURLOPT_URL, $endpoint);

        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);

        curl_close($ch);

        $responseArray = json_decode($response, true);

        if (isset($responseArray['error_type'])) {
            var_dump($responseArray);
            die();
        } else {
            return $responseArray;
        }
    }
}
