<?php

class SigninController extends Controller{

    function __construct(){
        parent::__construct();
    }


    function signin($token){
        if(isset($_POST['email']) && isset($_POST['password'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $data = array(
                'email' => $email,
                'password' => $password,
            );
            $jwt = $this->model->signin($data);
            if($jwt === null){
                http_response_code(403);
                echo json_encode(value: array("message" => "Unable to signin."));
            }else{
                http_response_code(200);
                echo json_encode(value: array("message" => "Signin successful.", "jwt" => $jwt));
            }
        }else{
            http_response_code(400);
            echo json_encode(array("message" => "Unable to signin. Need more data."));
        }
    }
}