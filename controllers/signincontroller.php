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
            $this->model->signin($data);
        }else{
            http_response_code(400);
            echo json_encode(array("message" => "Unable to signin. Need more data."));
        }
    }
}