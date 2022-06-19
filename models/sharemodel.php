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
        include ("config.php");
        $link = $photosURL . "?load=unsplash/getUserPhoto&id=" . $info['photo_id'];
        
        $response = $this->httpRequest($link, $token);

        return $response;
    }

    function getUnsplashPhotoPublic($token, $info){
        include ("config.php");
        $link = $photosURL . "/?load=unsplash/getUserPhotoPublic&id="
            . $info['photo_id']
            . "&user_id="
            . $info['owner_id'];

        $response = $this->httpRequest($link, $token);

        return $response;
    }

    function getShareLink($token, $info, $scope, $filters, $scaleX, $scaleY){
        $payload=json_decode(extractTokenPayload($token),true);
        $info = explode('/', $info);
        $data = ["owner_id" => $payload['id'],
            "platform" => $info[0],
            "photo_id" => $info[1],
            "filters" => $filters,
            "scope" => $scope,
            "scalex" => $scaleX,
            "scaley" => $scaleY
        ];

        $photo = $this->findPhoto($data);

        if (!$photo)
            return $this->insertPhoto($data);
        else return $photo;

    }

    function insertPhoto($data){

        $this->setSql("insert into shared_photos (owner_id, platform, photo_id, scope, filters, scalex, scaley) values (:owner_id, :platform, :photo_id, :scope, :filters, :scalex, :scaley);");

        $sth = $this->conn->prepare($this->querry);

        if (!$sth->execute($data)) {
            return false;
        }
        return $this->findPhoto($data);
    }

    function findPhoto($data){
        $payload=json_decode(extractTokenPayload($token),true);
        $this->setSql("select id from shared_photos where owner_id = :owner_id and platform = :platform and photo_id = :photo_id and scope = :scope and filters = :filters and scalex = :scalex and scaley = :scaley");

        $result = $this->getRow($data);

        return $result;
    }
}