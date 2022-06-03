<?php

class SigninController extends Controller{

    function __construct(){
        parent::__construct();
    }


    function signin(){
        if(isset($_PUT['email']) && isset($_PUT['password'])) {
            $email = $_PUT['email'];
            $password = $_PUT['password'];
            $data = array(
                'email' => $email,
                'password' => $password,
            );
            $this->model->signin($data);
        }else{
            http_response_code(400);
            echo json_encode(array("message" => "Unable to signin user. Need more data."));
        }
    }
}