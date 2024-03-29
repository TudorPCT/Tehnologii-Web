<?php

class PhotosController extends Controller
{

    function __construct(){
        parent::__construct();
    }

    function getUnsplashPhotos($token){
        $photos = $this->model->getUnsplashPhotos($token);
        if ($photos === null){
            http_response_code(400);
            die();
        }else echo $photos;
    }

    function photo($token){

        if (isset($_GET['platform']) && isset($_GET['id'])) {
            if ($_GET['platform'] === 'unsplash') {
                $info = $this->model->getUnsplashInfo($token, $_GET['id']);
                $alt = "unsplash/" . $info['id'];
                $data = ["link" => $info['urls']['full'],"platform"=>"unsplash","create_data" => $info['created_at'],"description"=>$info['description'],"width"=>$info['width'],"height"=>$info['height'], "likes" => $info['likes'], "downloads" => $info['downloads'], "alt" => $alt];
            } else if ($_GET['platform'] === 'tumblr' && isset($_GET['photo'])) {
                $info = $this->model->getTumblrInfo($token, $_GET['id'], $_GET['photo']);
                $infoPhoto = $this->model->getTumblrInfoPhoto($token,$_GET['id']);
                $alt = "tumblr/" . $_GET['id'] . "/" . $_GET['photo'];
                $data = ["link" => $info['url'],"platform"=>"tumblr","likes" => $infoPhoto['likes'],"comments" => $infoPhoto['comments'],"shares" => $infoPhoto['shares'], "alt" => $alt];
            } else {
                http_response_code(400);
                die();
            }
            $vizualizare = $this->view->editPhoto($data);
            echo $vizualizare;
        } else {
            http_response_code(400);
            die();
        }
    }

    function getTumblrPhotos($token){
        $photos = $this->model->getTumblrPhotos($token);
        if ($photos === null){
            http_response_code(400);
            die();
        }else echo $photos;
    }

    function getCollagePhotos($token){
        echo $this->model->getUnsplashPhotosInfo($token);
    }

    function collage($token){
        echo $this->view->collage();
    }

}