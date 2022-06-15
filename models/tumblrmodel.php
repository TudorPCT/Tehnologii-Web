<?php

class TumblrModel extends Model
{
    function __construct(){
        parent::__construct();
    }


    function getCode(){
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
}