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
        $unsplashPhotos = $unsplashModel->getUserPhotos($user_id);

        echo $unsplashPhotos;
return;
        echo "<div class=\"column\">" . PHP_EOL;

        for($index = 0; $index < count($unsplashPhotos); $index++) {
            if ($count % 5 === 0 && $count != 0) {
                echo "</div>" . PHP_EOL;
                echo "<div class=\"column\">" . PHP_EOL;
            }

            echo "<img src=\"" . "./img/art.jpg". "\">" . PHP_EOL;

            $count++;
        }


    }

    function getPhoto(){
        ;
    }
}