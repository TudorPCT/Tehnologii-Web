<?php

class SigninModel extends Model
{
    function __construct(){
        parent::__construct();
    }

    function check_user($email, $password){
        $this->setSql("select password from Users where email = :email");
        $data = ["email" => $email];
        if($this->getRow($data) == null)
            return false;
        else if(password_verify($password,$this->getRow($data)["password"]))
            return true;
        else return false;
    }

    function signin($data){
        if(
            !empty($data["email"]) &&
            !empty($data["password"])
        ){
            if($this->check_user($data["email"], $data["password"])){
                http_response_code(200);
                echo json_encode(array("message" => "Signin successful."));
            }
            else{
                http_response_code(403);
                echo json_encode(array("message" => "Unable to signin."));
            }
        }
        else{
            http_response_code(400);
            echo json_encode(array("message" => "Unable to create contact. Need more data."));
        }
    }
}