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
            if(0 != strcmp($data["password"], $data["password2"])
                    || !$this->check_user($data["email"])
                    || !filter_var($data["email"], FILTER_VALIDATE_EMAIL)){
                http_response_code(400);
                echo json_encode(array("message" => "Unable to create user"));
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
                    return true;
                }
            }
        return false;
    }
}