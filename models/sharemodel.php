<?php

class ShareModel extends Model
{
    function __construct(){
        parent::__construct();
    }

    function httpRequest($link, $token){
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $link);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $headers = array(
            "Accept: application/json",
            "Authorization: Bearer " . $token
        );
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $response = curl_exec($ch);
        curl_close($ch);

        return $response;
    }

    function getPhoto($token, $id){
        $this->setSql("select platform, photo_id from shared_photos where id = :id");

        $data = ["id" => $id];
        $result = $this->getRow($data);

        if($result == null)
            return null;
        $response = $this->httpRequest("https://socialmediabox.herokuapp.com/?load=" . $result['platform'] . "/getUserPhoto&id=" . $result['photo_id'], $token);

        return $response;
    }

}