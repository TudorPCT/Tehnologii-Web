<?php

class UnsplashModel extends Model
{
    function __construct(){
        parent::__construct();
    }


    function getCode(){
        include ("config.php");
        $link = "https://unsplash.com/oauth/authorize?client_id="
            . $unsplashClientId
            . "&redirect_uri="
            . "https://socialmediabox.herokuapp.com/?load=unsplash/authorize"
            . "&scope=public"
            . "&response_type=code"
            ;
        header("Location: " . $link);
        die();
    }

    function addUnsplashToken($code, $token){

        $ch = curl_init();
        include ("config.php");

        $params = "client_id=" . $unsplashClientId
            . "&client_secret=" . $unsplashSecret
            . "&redirect_uri=" . "https://socialmediabox.herokuapp.com/?load=unsplash/authorize"
            . "&code=" . $code
            . "&grant_type=" . "authorization_code";

        curl_setopt($ch, CURLOPT_URL, "https://unsplash.com/oauth/token");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,
            $params);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        curl_setopt($ch,CURLOPT_HTTPHEADER,array (
            "Accept: application/json"
        ));

        $output = curl_exec($ch);
        curl_close($ch);

//        echo $output;
        $response = json_decode($output,true);
        echo $response['access_token'];
        echo $response['refresh_token'];

        $unsplashToken=$response['access_token'];
//        $unsplashRefreshToken=$response['refresh_token'];

        $url = "https://api.unsplash.com/me";

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $headers = array(
            "Accept: application/json",
            "Authorization: Bearer ".$unsplashToken,
        );
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

        $user = curl_exec($curl);
        curl_close($curl);
//        echo $user;
        $response = json_decode($user,true);
        echo $response['username'];
        $username=$response['username'];

        $payload=json_decode(extractTokenPayload($token),true);
        $user_id=$payload['id'];

            $this->setSql("insert into accounts (user_id, username, account_token) values (:user_id,:username,:unsplashToken);");

            $insert_array = [
                "user_id" => $user_id,
                "username" => $username,
                "unsplashToken" => $unsplashToken

            ];

            $sth = $this->conn->prepare($this->querry);

            if ($sth->execute($insert_array)) {
                http_response_code(201);
                echo json_encode(array("message" => "Account added."));
                return true;
            } else {
                http_response_code(503);
                echo json_encode(array("message" => "Unable to add account."));
            }

    }

    function getUserPhotos($user, $page){


        $userJWT = null; //TODO

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://api.unsplash.com/users/' . $user . "?per_page=15");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $headers = array(
            "Accept: application/json",
            "Authorization: Bearer " . $userJWT
        );
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $photoList = curl_exec($ch);
        curl_close($ch);

        echo $photoList;
    }

}