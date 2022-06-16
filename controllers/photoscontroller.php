<?php

class PhotosController extends Controller
{

    function __construct(){
        parent::__construct();
    }

    function getUnsplashPhotos($token){
        echo $this->model->getUnsplashPhotos($token);
    }

    function photo($token){
        echo $_GET['platform'] . "*" . $_GET['id'];
        if (isset($_GET['platform']) && isset($_GET['id'])){
            if ($_GET['platform'] === 'unsplash')
                $info = $this->model->getUnsplashInfo($token, $_GET['id']);
            else if ($_GET['platform'] === 'tumblr')
                $info = $this->model->getTumblrInfo($token, $_GET['id']);
            else{
                http_response_code(400);
                die();
            }
            echo "*";
            $vizualizare = $this->view->editPhoto($info);
            echo "!";
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