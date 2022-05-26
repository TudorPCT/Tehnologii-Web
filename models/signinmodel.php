<?php
require_once HOME . DS . 'utils' . DS . 'token.php';
class SigninModel extends Model
{
    function __construct(){
        parent::__construct();
    }

    function check_user($email, $password){
        $this->setSql("select id,password from Users where email = :email");
        $data = ["email" => $email];
        if($this->getRow($data) == null)
            return null;
        else if(password_verify($password,$this->getRow($data)["password"]))
            return ['id' => $this->getRow($data)["id"],
                'email' => $email];
        else return null;
    }

    function signin($data){
        if(
            !empty($data["email"]) &&
            !empty($data["password"])
        ){
            $user_info = $this->check_user($data["email"], $data["password"]);
            if($user_info != null){
                http_response_code(200);
                echo json_encode(array("message" => "Signin successful.", "jwt" => create_JWT($user_info)));
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