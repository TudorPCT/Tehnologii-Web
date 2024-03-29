<?php

class AccountsModel extends Model
{
    function __construct(){
        parent::__construct();
    }
    function getAccounts($token){
        $payload=json_decode(extractTokenPayload($token),true);
        $user_id=$payload['id'];

        $querry="select * from accounts where user_id=".$user_id.";";
        $this->setSql($querry);
        $result = $this->getAll();

        if (sizeof($result) === 0)
            return "<h1> No accounts found </h1>";

        ob_start();

        for($index = 0; $index < sizeof($result); $index++) {

            echo "<div class=\"account\">";
            echo "<div class=\"id\">";
            if($result[$index]["platform"]=="unsplash") {
                echo " <img src=\"views/templates/img/unsplashIcon.png\">";
                echo "<a href=\"https://www.unsplash.com/".$result[$index]["username"]."/likes\" target=\"_blank\">";
            }
            else if ($result[$index]["platform"] == "tumblr") {
                echo " <img src=\"views/templates/img/tumblr.png\">";
                echo "<a href=\"https://www.tumblr.com/likes\" target=\"_blank\">";
            }
            else
                echo " <img src=\"views/templates/img/twitter.png\">";
            
            echo $result[$index]["username"];
            echo  "</a>";
            echo "</div>";
            echo "</div>";
        }
        
        $output = ob_get_contents();
        ob_end_clean();
        return $output;

    }
}