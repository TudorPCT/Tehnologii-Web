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

    function getLink($token){

        $method = $_SERVER['REQUEST_METHOD'];
        if ('PUT' === $method) {
            parse_str(file_get_contents('php://input'), $_PUT);
        }

        $info = $_PUT['info'];
        $scope = $_PUT['scope'];
        $filters = $_PUT['filters'];
        $scaleX = $_PUT['scalex'];
        $scaleY = $_PUT['scaley'];

        if (!isset($info,$scope,$filters,$scaleX,$scaleY)){
            http_response_code(400);
            die();
        }

        $photo = $this->model->getShareLink($token, $info, $scope, $filters, $scaleX, $scaleY);
        $link = 'https://socialmediabox.herokuapp.com/?load=share/photo&id=' .  $photo['id'];

        $response = ['link' => $link];
        echo json_encode($response);

    }

}