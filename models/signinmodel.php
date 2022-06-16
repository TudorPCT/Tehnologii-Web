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
        $user_info = $this->check_user($data["email"], $data["password"]);
        if($user_info != null){
            return createJWT($user_info);
        }
        else return null;
    }
}