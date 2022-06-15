<?php


class PhotosModel extends Model
{
    function __construct(){
        parent::__construct();
    }

    function getUnsplashPhotos($token){

        $token = $_COOKIE['jwt'];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, "https://socialmediabpx.herokuapp.ro/?load=unsplash/getUserPhotos");
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

        echo "<div class=\"column\">" . PHP_EOL;

        for($index = 0; $index < count($unsplashPhotos); $index++) {
            if ($count % 5 === 0 && $count != 0) {
                echo "</div>" . PHP_EOL;
                echo "<div class=\"column\">" . PHP_EOL;
            }

            echo "<img src=\"" . $unsplashPhotos[$index]["urls"]["full"] . "\">" . PHP_EOL;

            $count++;
        }

        echo "</div>" . PHP_EOL;

    }

    function getPhoto(){
        ;
    }
}