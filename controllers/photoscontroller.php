<?php

class PhotosController extends Controller
{
    private $user;
    function __construct(){
        parent::__construct();
    }

    function getPhotos(){
        function getBearerToken() {
            $headers = getAuthorizationHeader();
            if (!empty($headers)) {
                if (preg_match('/Bearer\s(\S+)/', $headers, $matches)) {
                    return $matches[1];
                }
            }
            return null;
        }
    }

}