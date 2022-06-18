<?php

class ShareController extends Controller
{
    function __construct(){
        parent::__construct();
    }

    function photo($token){
        if (isset($_GET['id'])){
            $photo = $this->model->getPhotoInfo($_GET['id']);

            $info = json_decode($this->model->getUnsplashPhoto($token, $photo), true);

            $data = ["link" => $info['urls']['regular'],
                "filters" => $photo['filters'],
                "scaleX" => $photo['scalex'],
                "scaleY" => $photo['scaley']];

            if ($token !== null) {
                $vizualizare = $this->view->showPrivate($data);
            }else if ($info !== null) {
                if ($photo['scope'] === 'public')
                    $vizualizare = $this->view->showPublic($data);
                else{
                    http_response_code(401);
                    die();
                }
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