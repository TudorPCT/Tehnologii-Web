<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: *");



    $auth = false;

    $controller = "Home";
    $action = "index";

    $headers = apache_request_headers();
    $token = getBearerToken($headers);

    if (isset($_COOKIE['jwt'])) {
        $token = $_COOKIE['jwt'];
    }


    if(verify_token($token)) {
        $auth = true;
        $controller = "accounts";
    }


    if (isset($_GET['load'])) {
        $params = array();
        $params = explode("/", $_GET['load']);

        $controller = ucwords($params[0]);

        if (strtolower($controller) === 'home'
                || strtolower($controller) === 'signin'
                || strtolower($controller) === 'register'){
            if($auth)
                $controller = "logout";
        }else{
            if(!$auth){
                http_response_code(401);
                exit(401);
            }
        }

        if (isset($params[1]) && !empty($params[1])) {
            $action = $params[1];
        }

    }

    $controller .= 'Controller';

    if(!class_exists($controller)){
        http_response_code(404);
        exit(404);
    }

    $load = new $controller();
    if (method_exists($load, $action))
    {
        $load->$action($token);
    }
    else
    {
        http_response_code(404);
        exit(404);
    }

?>
