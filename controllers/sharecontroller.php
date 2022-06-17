<?php

class ShareController extends Controller
{
    function __construct(){
        parent::__construct();
    }

    function photo($token){
        if (isset($_GET['id'])){
            $info = json_decode($this->model->getPhoto($token, $_GET['id']), true);
            $data = ["link" => $info['urls']['regular']];
            $vizualizare = $this->view->show($data);
            echo $vizualizare;
        } else {
            http_response_code(400);
            die();
        }
    }

}