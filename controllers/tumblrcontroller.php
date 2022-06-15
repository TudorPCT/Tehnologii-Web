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
        echo 'test';
        echo $this->model->getUserPhotos($token);
        echo "<img src=\"https://64.media.tumblr.com/02e83e5547d6e5f52b5aa5be2404961e/1dc6e5ee327c3bcf-11/s1280x1920/eb4867bc373ef63bf538097c9f24e7e053ad8d65.jpg\" alt=\"Girl in a jacket\" width=\"500\" height=\"600\">";
    }
}