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

        $response = curl_exec($ch);
        curl_close($ch);

        return $response;
    }


    function getUnsplashPhotos($token){

        $unsplashPhotos = json_decode($this->httpRequest("https://socialmediabox.herokuapp.com/?load=unsplash/getUserPhotos", $token), true);

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


        $tumblrPhotos = json_decode($this->httpRequest("https://socialmediabox.herokuapp.com/?load=tumblr/photos", $token), true);

        $count = 0;

        if(count($tumblrPhotos) === 0){
            echo "<h1>No Photos Found</h1>";
            return;
        }

        echo  "<div class=\"column\">" . PHP_EOL;

        for($index = 0; $index < count($tumblrPhotos); $index++) {
            if ($count % 5 === 0 && $count != 0) {
                echo  "</div>" . PHP_EOL;
                echo  "<div class=\"column\">" . PHP_EOL;
            }

            echo "<a href=\"./?load=photos/photo&platform=tumblr&id=" . $tumblrPhotos[$index]['id'] . "&photo=" . $tumblrPhotos[$index]['photo_index'] . "\">" . PHP_EOL;
            echo "<img src=\"" . $tumblrPhotos[$index]['url'] . "\">" . PHP_EOL;
            echo "</a>";

            $count++;
        }

        echo "</div>" . PHP_EOL;

        $output = ob_get_contents();
        ob_end_clean();
        return $output;
    }

    function getUnsplashInfo($token, $id){
        $info = $this->httpRequest("https://socialmediabox.herokuapp.com/?load=unsplash/getUserPhoto&id=" . $id, $token);
        return json_decode($info, true);
    }

    function getTumblrInfo($token, $id, $index) {
        $url = "https://socialmediabox.herokuapp.com/?load=tumblr/getUserPhoto"
            . "&id=" . $id
            . "&photo=" . $index;
        echo "URL = " . $url;
        $info = $this->httpRequest($url, $token);
        return json_decode($info, true);
    }
}