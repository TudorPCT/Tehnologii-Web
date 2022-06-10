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
            . "https%3A%2F%2Fsocialmediabox.herokuapp.com%2F?load=unsplash/getJWT"
            . "&scope=public"
            . "&response_type=code"
            ;
        header("Location: " . $link);
        echo code;
        die();
    }

    function addUnsplashToken($code, $token){

        $ch = curl_init();

        // set url
        curl_setopt($ch, CURLOPT_URL, "https://unsplash.com/oauth/token");

        //return the transfer as a string
        curl_setopt($ch,CURLOPT_HTTPHEADER,array (
            "Accept: application/json"
        ));

        // $output contains the output string
        $output = curl_exec($ch);

        // close curl resource to free up system resources
        curl_close($ch);

        echo $ch;

    }

}