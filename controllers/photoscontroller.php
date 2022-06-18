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
                $data = ["link" => $info['urls']['raw']];
            } else if ($_GET['platform'] === 'tumblr' && isset($_GET['photo'])) {
                $info = $this->model->getTumblrInfo($token, $_GET['id'], $_GET['photo']);
                $data = ["link" => $info['url']];
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
        echo $this->model->getTumblrPhotos($token);
    }

}