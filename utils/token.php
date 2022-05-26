<?php
function create_JWT($user_info){
    require HOME . DS . 'config.php';

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
    if ($token === null)
        return false;

    $token_exp = explode(".",$token);

    if(count($token_exp) !== 3)
        return false;

    $signature = base64_decode(str_replace( ['-', '_', ''], ['+', '/', '='], $token_exp[2]));
    echo $signature;
    return true;
}

function getBearerToken($headers) {
    if (isset($headers['Authorization'])) {
        if (preg_match('/Bearer\s(\S+)/', $headers, $matches)) {
            return $matches[1];
        }
    }
    return null;
}
