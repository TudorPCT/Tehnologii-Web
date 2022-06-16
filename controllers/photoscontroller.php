<?php

class PhotosController extends Controller
{

    function __construct(){
        parent::__construct();
    }

    function getUnsplashPhotos($token){
        echo $this->model->getUnsplashPhotos($token);
    }

    function getTumblrPhotos($token){
        echo $this->model->getTumblrPhotos($token);
    }

}