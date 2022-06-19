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
        include ("config.php");
        $link = $photosURL . "/?load=unsplash/getUserPhotos";
        $unsplashPhotos = json_decode($this->httpRequest($link, $token), true);
        $found = false;
        $count = 0;

        if (isset($unsplashPhotos["errors"]) || count($unsplashPhotos) === 0){
            return "<h1>No Photos Found</h1>";
        }


        if (isset($_GET['minLikes'],$_GET['maxLikes'],$_GET['minShares'],$_GET['maxShares'],$_GET['postDate'])){
            $minLikes = intval($_GET['minLikes']);
            $maxLikes = intval($_GET['maxLikes']);
            $minShares = intval($_GET['minShares']);
            $maxShares = intval($_GET['maxShares']);
            $postDate = intval($_GET['postDate']);
        }else return null;

        ob_start();

        echo  "<div class=\"column\">" . PHP_EOL;

        for($index = 0; $index < count($unsplashPhotos); $index++) {

            $now = new DateTime("now");
            $date = new DateTime($unsplashPhotos[$index]["created_at"]);
            $diff = $now->diff($date)->days / 30;


            if($minLikes <= $unsplashPhotos[$index]["likes"] && ($maxLikes === 0 || $maxLikes >=  $unsplashPhotos[$index]["likes"])
                    && $minShares <= $unsplashPhotos[$index]['statistics']["downloads"]['total'] && ($maxShares === 0 || $maxShares >=  $unsplashPhotos[$index]['statistics']["downloads"]['total'])
                    && ($postDate === 0 || $postDate >= $diff)) {
                if ($count % 5 === 0 && $count != 0) {
                    echo  "</div>" . PHP_EOL;
                    echo  "<div class=\"column\">" . PHP_EOL;
                }
                echo "<a href=\"./?load=photos/photo&platform=unsplash&id=" . $unsplashPhotos[$index]['id'] . "\">" . PHP_EOL;
                echo "<img src=\"" . $unsplashPhotos[$index]["urls"]["full"] . "\">" . PHP_EOL;
                echo "</a>";
                $count++;
                $found = true;
            }
        }

        echo "</div>" . PHP_EOL;


        $output = ob_get_contents();
        ob_end_clean();

        if (!$found)
            return "<h1>No Photos Found</h1>";

        return $output;
    }

    function getTumblrPhotos($token){
        include ("config.php");
        $link = $photosURL . "/?load=tumblr/photos";

        $tumblrPhotos = json_decode($this->httpRequest($link, $token), true);

        $count = 0;
        $found = false;

        if(count($tumblrPhotos) === 0){
            echo "<h1>No Photos Found</h1>";
            return;
        }

        if (isset($_GET['minLikes'],$_GET['maxLikes'],$_GET['minShares'],$_GET['maxShares'],$_GET['postDate'])){
            $minLikes = intval($_GET['minLikes']);
            $maxLikes = intval($_GET['maxLikes']);
            $minShares = intval($_GET['minShares']);
            $maxShares = intval($_GET['maxShares']);
            $postDate = intval($_GET['postDate']);
        }else return null;

        ob_start();

        echo  "<div class=\"column\">" . PHP_EOL;

        $last_id = 0;
        for($index = 0; $index < count($tumblrPhotos); $index++) {
            $now = new DateTime("now");
            $date = new DateTime($tumblrPhotos[$index]["date"]);
            $diff = $now->diff($date)->days / 30;
            // echo $diff;
            if ($tumblrPhotos[$index]['id'] != $last_id) {
                $link = $photosURL . "/?load=tumblr/getPhotoStats&id=" . $tumblrPhotos[$index]['id'];
                $stats = json_decode($this->httpRequest($link, $token), true);
                $last_id = $tumblrPhotos[$index]['id'];
            }
            //print_r($stats);

            if($minLikes <= $stats["likes"] && ($maxLikes === 0 || $maxLikes >=  $stats["likes"])
                    && $minShares <= $stats["shares"] && ($maxShares === 0 || $stats["shares"] <= $maxShares)
                    && ($postDate === 0 || $postDate >= $diff)) {
                
                if ($count % 1 === 0 && $count != 0) {
                    echo  "</div>" . PHP_EOL;
                    echo  "<div class=\"column\">" . PHP_EOL;
                }

                echo "<a href=\"./?load=photos/photo&platform=tumblr&id=" . $tumblrPhotos[$index]['id'] . "&photo=" . $tumblrPhotos[$index]['photo_index'] . "\">" . PHP_EOL;
                echo "<img src=\"" . $tumblrPhotos[$index]['url'] . "\">" . PHP_EOL;
                echo "</a>";

                $count++;
                $found = true;
            }
        }

        echo "</div>" . PHP_EOL;

        $output = ob_get_contents();
        ob_end_clean();

        if (!$found) {
            return "<h1>No Photos Found</h1>";
        }

        return $output;
    }

    function getUnsplashInfo($token, $id){
        include ("config.php");
        $link = $photosURL . "/?load=unsplash/getUserPhoto&id=" . $id;
        $info = $this->httpRequest($link, $token);
        return json_decode($info, true);
    }

    function getTumblrInfo($token, $id, $index) {
        include ("config.php");
        $link = $photosURL . "/?load=tumblr/getUserPhoto"
            . "&id=" . $id
            . "&photo=" . $index;
        $info = $this->httpRequest($link, $token);
        return json_decode($info, true);
    }
    function getTumblrInfoPhoto($token, $id) {
        include ("config.php");
        $link = $photosURL . "/?load=tumblr/getPhotoStats"
            . "&id=" . $id;
        $info = $this->httpRequest($link, $token);
        return json_decode($info, true);
    } 
}