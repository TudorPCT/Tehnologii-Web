<?php

class RegisterModel extends Model
{
    function __construct(){
        parent::__construct();
    }

    function check_user($email){
        $this->setSql("select id from Users where email = :email");
        $data = ["email" => $email];
        if($this->getRow($data) == null)
            return true;
        else
            return false;
    }

    function insert_user($data){
        if(
            !empty($data["first_name"]) &&
            !empty($data["last_name"]) &&
            !empty($data["email"]) &&
            !empty($data["password"])
        ){

            if(0 != strcmp($data["password"], $data["password2"])){
                http_response_code(400);
                echo json_encode(array("message" => "Unable to create user. Passwords don't match."));
            }else if(!$this->check_user($data["email"])){
                http_response_code(409);
                echo json_encode(array("message" => "Unable to create user. Already exists"));
            }else if(!filter_var($data["email"], FILTER_VALIDATE_EMAIL))
            {
                http_response_code(409);
                echo json_encode(array("message" => "Email format not valid"));
            }
            else
            {

                $this->setSql("insert into Users (first_name, last_name, email, password) values (:first_name, :last_name, :email, :password);");

                $insert_array = ["first_name" => $data["first_name"],
                    "last_name" => $data["last_name"],
                    "email" => $data["email"],
                    "password" => password_hash($data["password"], PASSWORD_DEFAULT)
                ];

                $sth = $this->conn->prepare($this->querry);

                if ($sth->execute($insert_array)) {
                    http_response_code(201);
                    echo json_encode(array("message" => "User added."));
                    return true;
                } else {
                    http_response_code(503);
                    echo json_encode(array("message" => "Unable to add user."));
                }
            }
        }
        else{
            http_response_code(400);
            echo json_encode(array("message" => "Unable to create user. Need more data."));
        }
        return false;
    }
}