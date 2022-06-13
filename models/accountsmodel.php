<?php

class AccountsModel extends Model
{
    function __construct(){
        parent::__construct();
    }
    function getAccounts($token){
        $payload=json_decode(extractTokenPayload($token),true);
        $user_id=$payload['id'];

        $user_id=6;

        $querry="select * from accounts where user_id=".$user_id.";";
        $this->setSql($querry);
        $result = $this->getAll();
        for($index = 0; $index < sizeof($result); $index++) {
            echo "<div class=\"acoounts\">$result[$index]['username']</div>" ;
        }

    }
}