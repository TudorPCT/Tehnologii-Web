<?php

class TumblrController extends Controller
{
    function __construct(){
        parent::__construct();
    }

    function authorize($token){
        if (isset($_GET["code"]) && isset($_GET["state"])) {
            if ($_GET["state"] == 123) {
                $this->getJWT($token);
            } else {
                echo "Authorization failed: States do not match.";
                die();
            }
        } else {
            $this->getCode();
        }
    }

    private function getCode(){
        $this->model->getCode();
    }

    private function getJWT($token){
        $this->model->addTumblrToken($_GET["code"], $token);
    }

    function photos($token){
        //print_r($this->model->getUserLikes($token));
        $this->model->getUserPhotos();
    }
}