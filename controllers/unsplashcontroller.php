<?php

class UnsplashController extends Controller
{
    function __construct(){
        parent::__construct();
    }


    function getCode(){
        if (isset($_COOKIE['jwt'])) {
            $token = $_COOKIE['jwt'];
        }

        if ($token === null || !verify_token($token)) {
            http_response_code(401);
            exit(401);
        }

        $this->model->getCode();
    }

    function getJWT(){

        if (isset($_COOKIE['jwt'])) {
            $token = $_COOKIE['jwt'];
        }

        if ($token === null || !verify_token($token)) {
            http_response_code(401);
            exit(401);
        }

        if(isset($_GET["code"])){
            echo "*";
            $this->model->addUnsplashToken($_GET("code"), $token);
        }
    }
}