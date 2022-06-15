<?php

class TumblrController extends Controller
{
    function __construct(){
        parent::__construct();
    }


    function authorize(){
        $token = $_COOKIE['jwt'];

        if (isset($_GET["code"])) {
            if ($_GET["state"] == 123) {
                $this->getJWT($token);
            } 
        } else {
            $this->getCode();
        }

    }

    private function getCode(){
        $this->model->getCode();
    }

    private function getJWT($token){
        $this->model->addUnsplashToken($_GET["code"], $token);
    }

    function getUserPhotos(){
        $this->model->getUserPhotos("tudorpc", 1);
    }
}