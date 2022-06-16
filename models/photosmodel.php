<?php


class PhotosModel extends Model
{
    function __construct(){
        parent::__construct();
    }

    function httpRequest($link, $token){
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $link);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $headers = array(
            "Accept: application/json",
            "Authorization: Bearer " . $token
        );
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $response = json_decode(curl_exec($ch), true);
        curl_close($ch);

        return $response;
    }


    function getUnsplashPhotos($token){


        $unsplashPhotos = $this->httpRequest("https://socialmediabox.herokuapp.com/?load=unsplash/getUserPhotos", $token);

        $count = 0;

        ob_start();
        
        if(count($unsplashPhotos) === 0){
            echo "<h1>No Photos Found</h1>";
            return;
        }

        echo  "<div class=\"column\">" . PHP_EOL;

        for($index = 0; $index < count($unsplashPhotos); $index++) {
            if ($count % 5 === 0 && $count != 0) {
                echo  "</div>" . PHP_EOL;
                echo  "<div class=\"column\">" . PHP_EOL;
            }

            echo "<a href=\"./?load=photos/photo&platform=unsplash&id=" . $unsplashPhotos[$index]['id']  . "\">" . PHP_EOL;
            echo "<img src=\"" . $unsplashPhotos[$index]["urls"]["full"] . "\">" . PHP_EOL;
            echo "</a>";
            $count++;
        }

        echo "</div>" . PHP_EOL;

        $output = ob_get_contents();
        ob_end_clean();
        return $output;
    }

    function getTumblrPhotos($token){


        $tumblrPhotos = $this->httpRequest("https://socialmediabox.herokuapp.com/?load=tumblr/photos", $token);

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

            $response .=  "<img src=\"" . $tumblrPhotos[$index]['url'] . "\">" . PHP_EOL;

            $count++;
        }

        $response .=  "</div>" . PHP_EOL;

        return $response;
    }

    function getUnsplashInfo($token, $id){
        ;
    }
}