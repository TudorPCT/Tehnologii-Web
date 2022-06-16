<?php


class PhotosModel extends Model
{
    function __construct(){
        parent::__construct();
    }

    function getUnsplashPhotos($token){

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, "https://socialmediabox.herokuapp.com/?load=unsplash/getUserPhotos");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $headers = array(
            "Accept: application/json",
            "Authorization: Bearer " . $token
        );
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $unsplashPhotos = json_decode(curl_exec($ch), true);
        curl_close($ch);

        $count = 0;

        if(count($unsplashPhotos) === 0){
            echo "<h1>No Photos Found</h1>";
            return;
        }

        $response =  "<div class=\"column\">" . PHP_EOL;

        for($index = 0; $index < count($unsplashPhotos); $index++) {
            if ($count % 5 === 0 && $count != 0) {
                $response .=  "</div>" . PHP_EOL;
                $response .=  "<div class=\"column\">" . PHP_EOL;
            }

            $response .=  "<img src=\"" . $unsplashPhotos[$index]["urls"]["full"] . "\">" . PHP_EOL;

            $count++;
        }

        $response .=  "</div>" . PHP_EOL;

        return $response;
    }

    function getTumblrPhotos($token){

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, "https://socialmediabox.herokuapp.com/?load=tumblr/photos");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $headers = array(
            "Accept: application/json",
            "Authorization: Bearer " . $token
        );
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $tumblrPhotos = json_decode(curl_exec($ch), true);
        curl_close($ch);

        $count = 0;

        if(count($tumblrPhotos) === 0){
            echo "<h1>No Photos Found</h1>";
            return;
        }

        $response =  "<div class=\"column\">" . PHP_EOL;

        for($index = 0; $index < count($tumblrPhotos); $index++) {
            if ($count % 5 === 0 && $count != 0) {
                $response .=  "</div>" . PHP_EOL;
                $response .=  "<div class=\"column\">" . PHP_EOL;
            }

            $response .=  "<img src=\"" . $tumblrPhotos[$index] . "\">" . PHP_EOL;

            $count++;
        }

        $response .=  "</div>" . PHP_EOL;

        return $response;
    }

    function getPhoto(){
        ;
    }
}