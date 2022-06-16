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
        $vizualizare = $this->view->editPhoto();
        echo $vizualizare;
    }

}