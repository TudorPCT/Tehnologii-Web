<?php

class TumblrModel extends Model
{
    function __construct() {
        parent::__construct();
    }


    function getCode() {
        include ("config.php");
        $link = "https://www.tumblr.com/oauth2/authorize?client_id="
            . $tumblrClientId
            . "&response_type=code"
            . "&scope=basic%20write%20offline_access"
            . "&state=123"
            ;
        header("Location: " . $link);
        die();
    }

    function addTumblrToken($code, $token) {
        $ch = curl_init();
        include("config.php");
        $params = "grant_type=" . "authorization_code"
                . "&code=" . $code
                . "&client_id=" . $tumblrClientId
                . "&client_secret=" . $tumblrSecret;
        
        curl_setopt($ch, CURLOPT_URL, "https://api.tumblr.com/v2/oauth2/token");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        curl_setopt($ch,CURLOPT_HTTPHEADER,array (
            "Accept: application/json"
        ));

        $output = curl_exec($ch);
        curl_close($ch);

        // echo $output;

        $response = json_decode($output, true);
        $tumblrToken = $response['access_token'];
        $tumblrRefreshToken = $response['refresh_token'];

        $url = "https://api.tumblr.com/v2/user/info";
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $headers = array(
            "Accept: application/json",
            "Authorization: Bearer " . $tumblrToken
        );
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

        $user = curl_exec($curl);
        curl_close($curl);

        // echo $user;

        $response = json_decode($user, true);
        // echo $response['response']['user']['name'];
        $username = $response['response']['user']['name'];

        $payload = json_decode(extractTokenPayload($token), true);
        $user_id = $payload['id'];

        $this->setSql("insert into accounts (user_id, username, account_token, platform) values (:user_id,:username,:tumblrToken,:platform);");

        $insert_array = [
            "user_id" => $user_id,
            "username" => $username,
            "tumblrToken" => $tumblrRefreshToken,
            "platform" => "tumblr"
        ];

        $sth = $this->conn->prepare($this->querry);
        if ($sth->execute($insert_array)) {
            header('Location: ./?load=accounts', true);
            die();
        } else {
            http_response_code(503);
            echo json_encode(array("message" => "Unable to add account."));
        }
    }

    function getUserPhotos($token) {
        $tumblrToken = $this->refreshToken($token);

        $url = 'https://api.tumblr.com/v2/user/likes';
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $headers = array(
            "Accept: application/json",
            "Authorization: Bearer " . $tumblrToken
        );
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        curl_close($ch);

        $response = json_decode($result, true);
        $photoList = array();

        $liked_posts = $response['response']['liked_posts'];

        foreach ($liked_posts as $post) {
            $photos = $post['photos'];
            foreach ($photos as $photo) {
                $photoUrl = $photo['caption']['original_size']['url'];
                array_push($photoList, $photoUrl);
            }
        }

        return $photoList;
    }

    private function refreshToken($jwtToken) {
        include("config.php");

        $payload = json_decode(extractTokenPayload($jwtToken), true);
        $user_id = $payload['id'];

        $this->setSql("SELECT * FROM accounts WHERE user_id = :user_id AND platform = :platform");

        $data = [
            'user_id' => $user_id,
            'platform' => 'tumblr'
        ];
        $userData = $this->getRow($data);

        $tumblrRefreshToken = $userData['account_token'];

        $ch = curl_init();
        
        $params = "grant_type=" . "refresh_token"
                . "&refresh_token=" . $tumblrRefreshToken
                . "&client_id=" . $tumblrClientId
                . "&client_secret=" . $tumblrSecret;
        
        curl_setopt($ch, CURLOPT_URL, "https://api.tumblr.com/v2/oauth2/token");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        curl_setopt($ch,CURLOPT_HTTPHEADER,array (
            "Accept: application/json"
        ));

        $output = curl_exec($ch);
        curl_close($ch);

        $response = json_decode($output, true);
        $tumblrToken = $response['access_token'];
        $tumblrRefreshToken = $response['refresh_token'];

        $this->setSql("UPDATE accounts SET account_token = :refresh_token WHERE user_id = :user_id AND platform = :platform");
        $data = [
            'refresh_token' => $tumblrRefreshToken,
            'user_id' => $user_id,
            'platform' => 'tumblr'
        ];

        $sth = $this->conn->prepare($this->querry);
        if ($sth->execute($data)) {
            
        } else {
            http_response_code(503);
            echo json_encode(array("message" => "Unable to refresh token."));
        }

        return $tumblrToken;
    }
}