<?php

class TumblrController extends Controller
{
    function __construct() {
        parent::__construct();
    }

    function authorize($token) {
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

    private function getCode() {
        $this->model->getCode();
    }

    private function getJWT($token) { 
        $this->model->addTumblrToken($_GET["code"], $token);
    }

    function photos($token) {
        //print_r($this->model->getUserLikes($token));
        echo $this->model->getUserPhotos($token);
    }

    function getUserPhoto($token){
        if (!isset($_GET['id']) || !isset($_GET['photo'])) {
            http_response_code(400);
            die();
        }

        echo $this->model->getUserPhoto($token, $_GET['id'], $_GET['photo']);
    }

    function delete($token) {
        $this->model->deleteAccount($token);
    }
}