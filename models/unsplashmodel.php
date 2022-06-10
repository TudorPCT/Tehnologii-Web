<?php

class UnsplashModel extends Model
{
    function __construct(){
        parent::__construct();
    }

    function getCode(){
        include ("config.php");
        $link = "https://unsplash.com/oauth/authorize?client_id="
            . $unsplashClientId
            . "&redirect_uri="
            . "https%3A%2F%2Fsocialmediabox.herokuapp.com/?load=unsplash/getJWT"
            . "&scope=public"
            . "&response_type=code"
            ;
        echo $link;
      //  header("Location: " . $link);
        die();
    }

    function addUnsplashToken($code, $token){

        echo $code;
        die();

        $ch = curl_init();
        include ("config.php");

        $params = "client_id=" . $unsplashClientId
            . "&client_secret=" . $unsplashSecret
            . "&redirect_uri=" . "socialmediabox.herokuapp.com"
            . "&code=" . $code
            . "&grant_type=" . "authorization_code";

        echo $params;

        curl_setopt($ch, CURLOPT_URL, "https://unsplash.com/oauth/token");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,
            $params);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        curl_setopt($ch,CURLOPT_HTTPHEADER,array (
            "Accept: application/json"
        ));

        $output = curl_exec($ch);

        curl_close($ch);

        echo $output;

    }

}