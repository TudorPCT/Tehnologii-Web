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

        echo $output;
    }
}