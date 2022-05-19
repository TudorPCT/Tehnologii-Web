<?php

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
            return $this->getRow($data)["id"];
        else return null;
    }

    function signin($data){
        if(
            !empty($data["email"]) &&
            !empty($data["password"])
        ){
            $user_id = $this->check_user($data["email"], $data["password"]);
            if($user_id != null){
                http_response_code(200);
                echo json_encode(array("message" => "Signin successful.", "jwt" => $this->create_JWT($user_id)));
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

    function create_JWT($user_id){

        $header = json_encode(['typ' => 'JWT', 'alg' => 'HS256']);
        $base64UrlHeader = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($header));

        $payload = json_encode(['id' => $user_id]);
        $base64UrlPayload = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($payload));

        $signature = hash_hmac('sha256', $base64UrlHeader . "." . $base64UrlPayload, 'abC123!', true);
        $base64UrlSignature = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($signature));

        return $base64UrlHeader . "." . $base64UrlPayload . "." . $base64UrlSignature;
    }
}