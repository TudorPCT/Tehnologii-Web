<?php

class UnsplashController extends Controller
{
    function __construct(){
        parent::__construct();
    }


    function authorize(){
        if (isset($_COOKIE['jwt'])) {
            $token = $_COOKIE['jwt'];
        }

        if ($token === null || !verify_token($token)) {
            http_response_code(401);
            exit(401);
        }

        if(isset($_GET["code"]))
            $this->getJWT($token);
        else $this->getCode();

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