<?php

class PhotosController extends Controller
{
    private $user;
    function __construct(){
        parent::__construct();
    }

    function getUnsplashPhotos($token){
        $this->model->getUnsplashPhotos($token);
    }

}