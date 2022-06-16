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

    function getUserPhotos($token){
        $payload=json_decode(extractTokenPayload($token),true);
        echo $this->model->getUserPhotos($payload['id']);
    }

    function delete($token) {
        $this->model->deleteAccount($token);
    }
}