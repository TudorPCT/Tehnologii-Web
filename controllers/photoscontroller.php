<?php

class PhotosController extends Controller
{
    private $user;
    function __construct(){
        parent::__construct();
    }

    function getUnsplashPhotos(){
        $token = $_COOKIE['jwt'];
        $this->model->getUnsplashPhotos($token);
    }

}