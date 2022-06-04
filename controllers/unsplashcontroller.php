<?php
header("Access-Control-Allow-Origin: *");
require_once HOME . DS . 'config.php';
class UnsplashController extends Controller
{
    function __construct(){
        parent::__construct();
    }

    function getCode(){
        include ("config.php");

        $ch = curl_init();


        curl_setopt($ch, CURLOPT_URL, "https://api.unsplash.com/search/photos?query=london&client_id=" . $unsplashClientId );

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $output = curl_exec($ch);

        echo $output;
        curl_close($ch);
    }
}