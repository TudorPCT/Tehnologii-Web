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

    function getUserPhoto($token){
        if (!isset($_GET['id'])) {
            http_response_code(400);
            die();
        }
        
        if (isset($_GET['user_id']){
            echo $this->model->getUserPhoto($_GET['user_id'], $_GET['photo_id']);
        }else{
            $payload = json_decode(extractTokenPayload($token), true);
            echo $this->model->getUserPhotoPrivate($payload['id'], $_GET['id']);
        }
    }
    
    function delete($token) {
        $this->model->deleteAccount($token);
    }
}
