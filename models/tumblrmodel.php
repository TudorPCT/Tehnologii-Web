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

    // function getUserLikes($token) {
    //     $tumblrToken = $this->refreshToken($token);

    //     $url = 'https://api.tumblr.com/v2/user/likes';
    //     $ch = curl_init($url);
    //     curl_setopt($ch, CURLOPT_URL, $url);
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //     $headers = array(
    //         "Accept: application/json",
    //         "Authorization: Bearer " . $tumblrToken
    //     );
    //     curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    //     $result = curl_exec($ch);
    //     curl_close($ch);

    //     $response = json_decode($result, true);
    //     $photoList = array();

    //     // print_r($response);

    //     $liked_posts = $response['response']['liked_posts'];

    //     foreach ($liked_posts as $index => $post) {
    //         if ($post['type'] == 'photo') {
    //             $photos = $post['photos'];
    //             foreach ($photos as $asphoto => $photo) {
    //                 $photoUrl = $photo['original_size']['url'];
    //                 array_push($photoList, $photoUrl);
    //             }
    //         } else if ($post['type'] == 'text') {
    //             $body = $post['body'];
    //             $x = explode("<", $body);

    //             foreach($x as $line) {
    //                 if (strncmp($line, "img", 3) == 0) {
    //                     $substr = explode(" ", $line);
    //                     foreach($substr as $src) {
    //                         if (strncmp($src, "src", 3) == 0){
    //                         $length = strlen($src);
    //                         $indexStart = -1;
    //                         $indexEnd = -1;
    //                         for ($index = 3; $index < $length; $index++) {
    //                             if ($src[$index] == '"' && $indexStart == -1) $indexStart = $index;
    //                             else if ($src[$index] == '"' && $indexEnd == -1) $indexEnd = $index;
    //                         }
    //                         $url = substr($src, $indexStart + 1, $indexEnd - $indexStart - 1);
    //                         array_push($photoList, $url);
    //                         }
    //                     }
    //                 }    
    //             }
    //         }
    //     }

    //     $jsonPhotos = json_encode($photoList);

    //     return $jsonPhotos;
    // }

    function getUserPhotos($token) {
        include("config.php");

        $payload = json_decode(extractTokenPayload($token), true);
        $user_id = $payload['id'];

        $this->setSql("SELECT * FROM accounts WHERE user_id = :user_id AND platform = :platform");

        $data = [
            'user_id' => $user_id,
            'platform' => 'tumblr'
        ];
        $userData = $this->getRow($data);

        $username = $userData['username'];

        $url = "https://api.tumblr.com/v2/blog/"
            . $username . ".tumblr.com/posts/photo"
            . "?api_key=" . $tumblrClientId
            . "&npf=true";

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $headers = array(
            "Accept: application/json"
        );

        //curl_setopt($ch, CURLOPT_HEADER, $headers);

        $response = curl_exec($ch);
        curl_close($ch);

        $result = json_decode($response, true);

        // print_r($result);
        
        $photoList = array();

        $posts = $result['response']['posts'];

        foreach ($posts as $post) {
            $post_date = $post['date'];
            $post_id = $post['id'];
            $index = 0;
            $content_list = $post['trail'][0]['content'];
            foreach ($content_list as $content) {
                if ($content['type'] == 'image') {
                        $url = $content['media'][0]['url'];
                        $photoArray = array('url' => $url, 'id' => $post_id, 'photo_index' => $index, 'date' => $post_date);
                        array_push($photoList, $photoArray);
                        $index++;
                }
            }
            $content_list = $post['content'];
            foreach ($content_list as $content) {
                if ($content['type'] == 'image') {
                        $url = $content['media'][0]['url'];
                        $photoArray = array('url' => $url, 'id' => $post_id, 'photo_index' => $index, 'date' => $post_date);
                        array_push($photoList, $photoArray);
                        $index++;
                }
            }
        }

        $jsonPhotos = json_encode($photoList);

        return $jsonPhotos;
    }

    private function refreshToken($user_id) {
        include("config.php");

        $this->setSql("SELECT * FROM accounts WHERE user_id = :user_id AND platform = :platform");

        $data = [
            'user_id' => $user_id,
            'platform' => 'tumblr'
        ];
        $userData = $this->getRow($data);

        $tumblrRefreshToken = $userData['account_token'];

        $ch = curl_init();
        
        // $params = "grant_type=" . "refresh_token"
        //         . "&refresh_token=" . $tumblrRefreshToken
        //         . "&client_id=" . $tumblrClientId
        //         . "&client_secret=" . $tumblrSecret;

        $params = array("grant_type" => "refresh_token", "refresh_token" => $tumblrRefreshToken, "client_id" => $tumblrClientId, "client_secret" => $tumblrSecret);
        
        curl_setopt($ch, CURLOPT_URL, "https://api.tumblr.com/v2/oauth2/token");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
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

    function getUserPhoto($user_id, $post_id, $photo_index) {
        $tumblrToken = $this->refreshToken($user_id);

        $this->setSql("SELECT * FROM accounts WHERE user_id = :user_id AND platform = :platform");

        $data = [
            'user_id' => $user_id,
            'platform' => 'tumblr'
        ];
        $userData = $this->getRow($data);

        $username = $userData['username'];

        $url = "https://api.tumblr.com/v2/blog/"
            . $username . ".tumblr.com/"
            . "posts/" . $post_id;

        // echo "<br>" . $url;

        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $headers = array(
            "Accept: application/json",
            "Authorization: Bearer " . $tumblrToken
        );
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $response = curl_exec($ch);
        curl_close($ch);
        // echo "<br>" . $response;

        $result = json_decode($response, true);

        $index = 0;
        $content_list = $result['response']['trail'][0]['content'];
        foreach ($content_list as $content) {
            if ($content['type'] == 'image') {
                if ($index == $photo_index) {
                    $url = ["url" => $content['media'][0]['url']];
                    $urlJSON = json_encode($url);
                    return $urlJSON;
                } else {
                    $index++;
                }
            }
        }
        $content_list = $result['response']['content'];
        foreach ($content_list as $content) {
            if ($content['type'] == 'image') {
                if ($index == $photo_index) {
                    $url = ["url" => $content['media'][0]['url']];
                    $urlJSON = json_encode($url);
                    return $urlJSON;
                } else {
                    $index++;
                }
            }
        }
    }

    function getPhotoStats($token, $post_id) {
        include("config.php");
        $likeCount = 0;
        $commCount = 0;
        $shareCount = 0;

        $payload = json_decode(extractTokenPayload($token), true);
        $user_id = $payload['id'];

        $this->setSql("SELECT * FROM accounts WHERE user_id = :user_id AND platform = :platform");

        $data = [
            'user_id' => $user_id,
            'platform' => 'tumblr'
        ];
        $userData = $this->getRow($data);

        $username = $userData['username'];

        $url = "https://api.tumblr.com/v2/blog/"
            . $username . ".tumblr.com/"
            . "notes?"
            . "id=" . $post_id
            . "&mode=conversation"
            . "&api_key=" . $tumblrClientId;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        curl_close($ch);

        $result = json_decode($response, true);
        $likeCount = $result['response']['total_likes'];
        $shareCount = $result['response']['total_reblogs'];
        $commCount = $result['response']['total_notes'] - ( $likeCount + $shareCount);

        if (!isset($likeCount))
            $likeCount = 0;
        if (!isset($shareCount))
            $shareCount = 0;
        if (!isset($commCount))
            $commCount = 0;
        $stats = ["likes" => $likeCount, "shares" => $shareCount, "comments" => $commCount];

        return json_encode($stats);
    }

    function postPhoto($user_id, $photo_url) {
        $tumblrToken = $this->refreshToken($user_id);

        $this->setSql("SELECT * FROM accounts WHERE user_id = :user_id AND platform = :platform");

        $data = [
            'user_id' => $user_id,
            'platform' => 'tumblr'
        ];
        $userData = $this->getRow($data);

        $username = $userData['username'];
        
        $params = array("data64" => $photo_url,"type" => "photo");
        $paramsHttp = http_build_query($params);
        
        $ch = curl_init();
        
        $url = "https://api.tumblr.com/v2/blog/"
            . $username . ".tumblr.com/post";
        
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $paramsHttp);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Authorization: Bearer " . $tumblrToken,
            "Content-type: application/x-www-form-urlencoded",
            "Expect: ")
        );

        $output = curl_exec($ch);
        curl_close($ch);

        echo $output;
    }

    function deleteAccount($token) {
        $payload = json_decode(extractTokenPayload($token), true);
        $user_id = $payload['id'];

        $this->setSql("DELETE FROM accounts WHERE user_id = :user_id AND platform = :platform");
        $data = [
            'user_id' => $user_id,
            'platform' => 'tumblr'
        ];

        $sth = $this->conn->prepare($this->querry);
        if ($sth->execute($data)) {
            header("Location: https://socialmediabox.herokuapp.com/?load=accounts");
        } else {
            http_response_code(403);
            echo json_encode(array("message" => "Unable to delete account."));
        }
    }
}