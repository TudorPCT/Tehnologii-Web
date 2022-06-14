<?php

class PhotosController extends Controller
{
    private $user;
    function __construct(){
        parent::__construct();
    }

    function getPhotos(){
        $token = $_COOKIE['jwt'];
        $this->model->getPhotos($token);
    }

}