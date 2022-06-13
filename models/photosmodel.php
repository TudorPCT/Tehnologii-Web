<?php


class PhotosModel extends Model
{
    function __construct(){
        parent::__construct();
    }

    function getPhotos(){
        $email = "tcosmin.pasat@gmail.com";
        $tokenPayload = json_decode(extractTokenPayload($_COOKIE["jwt"]));
        $unsplashModel = new UnsplashModel();
        $count = 0;
        $unsplashPhotos = $unsplashModel->getPhotos($tokenPayload['id']);

        echo "<div class=\"column\">" . PHP_EOL;

        for($index = 0; $index < 15; $index++) {
            if ($count % 5 === 0 && $count != 0) {
                echo "</div>" . PHP_EOL;
                echo "<div class=\"column\">" . PHP_EOL;
            }

            echo "<img src=\"./img/art.jpg\">" . PHP_EOL;

            $count++;
        }


    }

    function getPhoto(){
        ;
    }
}