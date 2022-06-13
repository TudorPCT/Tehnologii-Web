<?php


class PhotosModel extends Model
{
    function __construct(){
        parent::__construct();
    }

    function getPhotos(){
        $email = "tcosmin.pasat@gmail.com";
        $token = "d4q2gP4eRu8d72TC-l_Khb_tEZ6023JaRekNCOI2d8c";

        for($index = 0; $index < 18; $index++) {
            if ($index % 6 === 0)
                echo "<div class=\"column\">" . PHP_EOL;

            echo "<img src=\"./img/art.jpg\">" . PHP_EOL;

            if ($index % 5 === 0 && $index != 0)
                echo "</div>" . PHP_EOL;
        }
    }

    function getPhoto(){
        ;
    }
}