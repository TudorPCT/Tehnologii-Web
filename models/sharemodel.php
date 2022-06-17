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

        $photo = $this->getPhotoInfo($id);
        
        if ($token !== null)
            $this->getPhotoPrivate($token, $id);
        else{

        }
    }
    
    function getPhotoInfo($id){
        $this->setSql("select * from shared_photos where id = :id");

        $data = ["id" => $id];
        $result = $this->getRow($data);
        
        if($result == null)
            return null;
        
        return $result;
    }

    function getPhotoPrivate($token, $info){
        $response = $this->httpRequest("https://socialmediabox.herokuapp.com/?load="
            . $info['platform']
            . "/getUserPhoto&photo_id="
            . $info['photo_id']
            , $token);
        return $response;
    }

    function getPhotoPublic($token, $info){
        $response = $this->httpRequest("https://socialmediabox.herokuapp.com/?load="
            . $info['platform']
            . "/getUserPhoto&photo_id="
            . $info['photo_id']
            . "&user_id="
            . $info['user_id']
            , $token);
        return $response;
    }

}