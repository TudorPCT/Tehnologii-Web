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
                echo json_encode(array("message" => "Signin successful.", "jwt" => $this->create_JWT($user_info)));
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

    function create_JWT($user_info){
        include ("config.php");
        $header = json_encode(['typ' => 'JWT', 'alg' => 'HS256']);
        $base64UrlHeader = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($header));

        $iat = time();
        $exp = $iat + 60 * 60;
        $payload = json_encode(array('iat' => $iat,
                                'exp' => $exp,
                                'iss' => 'localhost',
                                'aud' => 'localhost',
                                'id' => $user_info["id"],
                                'email' => $user_info["email"]));

        $base64UrlPayload = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($payload));

        $signature = hash_hmac('sha256', $base64UrlHeader . "." . $base64UrlPayload, $key, true);
        $base64UrlSignature = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($signature));

        $jwt = $base64UrlHeader . "." . $base64UrlPayload . "." . $base64UrlSignature;

        $params = explode(".", $jwt);

        $headsa = str_replace(['-', '_', ''],['+', '/', '='], base64_decode($params[1]));
        echo $headsa;
    }
}