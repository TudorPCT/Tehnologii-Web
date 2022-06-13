<?php

class AccountsModel extends Model
{
    function __construct(){
        parent::__construct();
    }
    function getAccounts($token){
        $payload=json_decode(extractTokenPayload($token),true);
        $user_id=$payload['id'];

        $this->setSql("select username from accounts");

        $select_array = [
            "user_id" => $user_id

        ];

        $sth = $this->conn->prepare($this->querry);

        if ($sth->execute($select_array)) {
            http_response_code(201);
            echo json_encode(array("message" => "Account added."));
            echo $this->getRow();
            return true;
        } else {
            http_response_code(503);
            echo json_encode(array("message" => "Unable to add account."));
        }

//        $result = pg_query($this->conn->, "SELECT author, email FROM authors");
//        if (!$result) {
//            echo "An error occurred.\n";
//            exit;
//        }

//        while ($row = pg_fetch_row($result)) {
//            echo "Author: $row[0]  E-mail: $row[1]";
//            echo "<br />\n";
//        }
    }
}