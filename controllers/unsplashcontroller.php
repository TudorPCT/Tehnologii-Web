<?php

class UnsplashController extends Controller
{
    function __construct(){
        parent::__construct();
    }


    function authorize(){
        $token = $_COOKIE['jwt'];

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
        $headers = apache_request_headers();
        $token = getBearerToken($headers);

        if (isset($_COOKIE['jwt'])) {
            $token = $_COOKIE['jwt'];
        }

        $payload=json_decode(extractTokenPayload($token),true);
        echo $this->model->getUserPhotos($payload['id']);
    }
}