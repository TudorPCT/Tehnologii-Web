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

            $this->setSql("insert into Users (first_name, last_name, email, password) values (:first_name, :last_name, :email, :password);");

            $insert_array = ["first_name" => $data["first_name"],
                "last_name" => $data["last_name"],
                "email" => $data["email"],
                "password" => $data["password"]
            ];

            $sth = $this->conn->prepare($this->querry);
            $sth->execute($insert_array);

            if($sth->execute($insert_array)){
                http_response_code(201);
                echo json_encode(array("message" => "Contact added."));
            }
            else{
                http_response_code(503);
                echo json_encode(array("message" => "Unable to add contact."));
            }
        }
        else{
            http_response_code(400);
            echo json_encode(array("message" => "Unable to create contact. Need more data."));
        }
    }
}