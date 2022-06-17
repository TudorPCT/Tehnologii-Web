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

    function getPhotoInfo($id){
        $this->setSql("select * from shared_photos where id = :id");

        $data = ["id" => $id];

        $result = $this->getRow($data);

        if($result == null)
            return null;

        return $result;
    }

    function getUnsplashPhoto($token, $photo){
        if (isset($token))
            return $this->getUnsplashPhotoPrivate($token, $photo);
        else{
            return $this->getUnsplashPhotoPublic($token, $photo);
        }
    }

    function getUnsplashPhotoPrivate($token, $info){
        $response = $this->httpRequest("localhost:8080/Tehnologii-Web/?load=unsplash/getUserPhoto&id="
            . $info['photo_id']
            , $token);
        return $response;
    }

    function getUnsplashPhotoPublic($token, $info){
        $response = $this->httpRequest("localhost:8080/Tehnologii-Web/?load=unsplash/getUserPhotoPublic&id="
            . $info['photo_id']
            . "&user_id="
            . $info['owner_id']
            , $token);
        return $response;
    }

}