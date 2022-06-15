<?php

class RegisterController extends Controller{
    function __construct(){
        parent::__construct();
    }


    function signup($token){
        if(isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['email'])
            && isset($_POST['password']) && isset($_POST['password2'])) {
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $password2 = $_POST['password2'];
            $data = array(
                'id' =>null,
                'first_name' => $first_name,
                'last_name' => $last_name,
                'email' => $email,
                'password' => $password,
                'password2' => $password2
            );
            $this->model->insert_user($data);
        }else{
            http_response_code(400);
            echo json_encode(array("message" => "Unable to create user. Need more data."));
        }
    }

}