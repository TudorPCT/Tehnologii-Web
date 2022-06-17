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
            if ($token !== null) {
                $vizualizare = $this->view->showPrivate($data);
            }else if ($info !== null) {
                $vizualizare = $this->view->showPublic($data);
            }else{
                http_response_code(404);
                die();
            }
            echo $vizualizare;
        } else {
            http_response_code(400);
            die();
        }
    }

}