<?php

class TumblrModel extends Model
{
    function __construct() {
        parent::__construct();
    }


    function getCode() {
        include ("config.php");
        $link = "https://www.tumblr.com/oauth2/authorize?client_id="
            . $tumblrClientId
            . "&response_type=code"
            . "&scope=basic%20write"
            . "&state=123"
            ;
        header("Location: " . $link);
        die();
    }

    function addTumblrToken($code, $token) {
        $ch = curl_init();
        include("config.php");

        $params = "grant_type=" . "authorization_code"
                . "&code=" . $code
                . "&client_id=" . $tumblrClientId
                . "&client_secret=" . $tumblrSecret;
        
        curl_setopt($ch, CURLOPT_URL, "https://api.tumblr.com/v2/oauth2/token");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        curl_setopt($ch,CURLOPT_HTTPHEADER,array (
            "Accept: application/json"
        ));

        $output = curl_exec($ch);
        curl_close($ch);

        //echo $output;

        $response = json_decode($output, true);
        $tumblrToken = $response['access_token'];

        $url = "https://api.tumblr.com/v2/user/info";
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $headers = array(
            "Accept: application/json",
            "Authorization: Bearer " . $tumblrToken
        );
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

        $user = curl_exec($curl);
        curl_close($curl);

        //echo $user;

        $respone = json_decode($user, true);
        echo $response['response']['user']['name'];
    }
}