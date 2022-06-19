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
        // echo $this->model->getUserLikes($token);
        echo $this->model->getUserPhotos($token);
    }

    function getUserPhoto($token){
        if (!isset($_GET['id']) || !isset($_GET['photo'])) {
            http_response_code(400);
            die();
        }

        $payload = json_decode(extractTokenPayload($token), true);
        echo $this->model->getUserPhoto($payload['id'], $_GET['id'], $_GET['photo']);
    }

    function getUserPhotoPublic() {
        if (!isset($_GET['id']) || !isset($_GET['user_id']) || !isset($_GET['photo'])) {
            http_response_code(412);
            die();
        }
        echo json_encode(array("message" => $_GET['user_id'] . $_GET['id'] . $_GET['photo']));
        echo $this->model->getUserPhoto($_GET['user_id'], $_GET['id'], $_GET['photo']);
    }

    function getPhotoStats($token) {
        if (!isset($_GET['id'])) {
            http_response_code(400);
            die();
        }

        echo $this->model->getPhotoStats($token, $_GET['id']);
    }

    function postPhoto($token) {
        $request = file_get_contents('php://input');
        // echo $request;

        $data = substr($request, 22);

        // echo $data;
        $payload = json_decode(extractTokenPayload($token), true);
        echo $this->model->postPhoto($payload['id'], $data);
    }

    function delete($token) {
        $this->model->deleteAccount($token);
    }

}