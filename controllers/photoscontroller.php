<?php

class PhotosController extends Controller
{
    private $user;
    function __construct(){
        parent::__construct();
    }

    function getPhotos(){
        $headers = apache_request_headers();
        $token = getBearerToken($headers);

        if ($token === null || !verify_token($token)) {
            http_response_code(401);
            exit(401);
        }else{
            $this->model->getPhotos($token);
        }

    }

}