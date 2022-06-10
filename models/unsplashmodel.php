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
        die();
    }

    function addUnsplashToken($code, $token){



    }

}