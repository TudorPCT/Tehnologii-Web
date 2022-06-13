<?php

class AccountsModel extends Model
{
    function __construct(){
        parent::__construct();
    }
    function getAccounts($token){
        $payload=json_decode(extractTokenPayload($token),true);
        $user_id=$payload['id'];

        $this->setSql("select * from accounts;");
        $result = $this->getAll();
//        echo "dunt in functie";
<<<<<<< Updated upstream
        echo $result;
=======
        echo $result[0]["username"];
>>>>>>> Stashed changes

        while ($row = pg_fetch_row($result)) {
            echo "Author: $row[0]  E-mail: $row[1]";
            echo "<br />\n";
        }
    }
}