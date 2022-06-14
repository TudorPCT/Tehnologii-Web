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
//        echo "<ul>";
        for($index = 0; $index < sizeof($result); $index++) {
//            if($result[$index][""])
//            echo "<li>";
//            echo $result[$index]["username"] .PHP_EOL;
//            echo "</li>";
            echo "<div class=\"account\">";
            echo "<div class=\"id\">";
            echo " <img src=\"./img/instagram.png\">";
            echo "<a href=\"https://www.instagram.com/\" target=\"_blank\">";
            echo $result[$index]["username"];
            echo  "</a>";
            echo "</div>";
            echo "</div>";
        }
//        echo "</ul>";
        return false;

    }
}