<?php
session_start();

class PhotosModel extends Model
{
    function __construct(){
        parent::__construct();
    }

    function getPhotos(){
        if (!isset($_GET['code']) && !isset($_SESSION['token'])) {

            \Unsplash\HttpClient::init([
                'applicationId'	=> '{clientId}',
                'secret'		=> '{clientSecret}',
                'callbackUrl'	=> 'http://172.30.80.1/MPIC/'
            ]);
            $httpClient = new HttpClient();
            $scopes = ['write_user', 'public'];

            header("Location: ". $httpClient::$connection->getConnectionUrl($scopes));
            exit;
        }

        if (isset($_GET['code']) && !isset($_SESSION['token'])) {
            \Unsplash\HttpClient::init([
                'applicationId'	=> '{clientId}',
                'secret'		=> '{clientSecret}',
                'callbackUrl'	=> 'http://unsplash-api.dev'
            ]);

            try {
                $token = \Unsplash\HttpClient::$connection->generateToken($_GET['code']);
            } catch (Exception $e) {
                print("Failed to generate access token: {$e->getMessage()}");
                exit;
            }

            // Store the access token, use this for future requests
            $_SESSION['token'] = $token;
        }

        \Unsplash\HttpClient::init([
            'applicationId'	=> '{clientId}',
            'secret'		=> '{clientSecret}',
            'callbackUrl'	=> 'http://unsplash-api.dev'
        ], [
            'access_token' => $_SESSION['token']->getToken(),
            'expires_in' => 30000,
            'refresh_token' => $_SESSION['token']->getRefreshToken()
        ]);

        $httpClient = new \Unsplash\HttpClient();
        $owner = $httpClient::$connection->getResourceOwner();

        print("Hello {$owner->getName()}, you have authenticated successfully");
    }
}