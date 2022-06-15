<?php


class PhotosModel extends Model
{
    function __construct(){
        parent::__construct();
    }

    function getUnsplashPhotos($token){
        $payload=json_decode(extractTokenPayload($token),true);
        $user_id=$payload['id'];
        $unsplashModel = new UnsplashModel();
        $count = 0;
        $unsplashPhotos = json_decode($unsplashModel->getUserPhotos($user_id), true);

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