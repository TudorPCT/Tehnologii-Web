<?php

function createJWT($user_info){
    include ("config.php");

    $header = json_encode(['typ' => 'JWT', 'alg' => 'HS256']);
    $base64UrlHeader = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($header));

    $iat = time();
    $exp = $iat + 60 * 60;
    $payload = json_encode(array('iat' => $iat,
        'exp' => $exp,
        'iss' => 'localhost',
        'aud' => 'localhost',
        'id' => $user_info["id"],
        'email' => $user_info["email"]));

    $base64UrlPayload = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($payload));

    $signature = hash_hmac('sha256', $base64UrlHeader . "." . $base64UrlPayload, $key, true);
    $base64UrlSignature = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($signature));


    return $base64UrlHeader . "." . $base64UrlPayload . "." . $base64UrlSignature;
}

function verify_token($token){
    include ("config.php");
    if ($token === null)
        return false;

    $tokenExploded = explode(".",$token);

    if(count($tokenExploded) !== 3)
        return false;

    $signature = hash_hmac('sha256', $tokenExploded[0] . "." . $tokenExploded[1], $key, true);
    $base64UrlSignature = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($signature));

    if ($base64UrlSignature === $tokenExploded[2])
        return true;
    return false;
}

function getBearerToken($headers) {
    if (isset($headers['Authorization'])) {
        $params = explode(" ", $headers['Authorization']);
        if (isset($params[0]) && $params[0] === 'Bearer' && isset($params[1])) {
            return $params[1];
        }
    }
    return null;
}

function extractTokenPayload($token){

    $tokenExploded = explode(".",$token);
    $base64UrlPayload = $tokenExploded[1];

    $payload =  base64_decode(str_replace(['-', '_', ''], ['+', '/', '='], $base64UrlPayload));

    return $payload;

}

