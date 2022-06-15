<?php


class PhotosModel extends Model
{
    function __construct(){
        parent::__construct();
    }

    function getPhotos($token){
        $payload=json_decode(extractTokenPayload($token),true);
        $user_id=$payload['id'];
        $unsplashModel = new UnsplashModel();
        $count = 0;
        $unsplashPhotos = json_decode($unsplashModel->getUserPhotos($user_id), true);

        echo "<h1>Unsplash</h1>";
        echo "<div id=\"row\">" . PHP_EOL;
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

        echo "</div>" . PHP_EOL;

    }

    function getPhoto(){
        ;
    }
}