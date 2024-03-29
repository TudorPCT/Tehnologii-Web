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

        if (isset($params[1]) && !empty($params[1])) {
            $action = $params[1];
        }
        
        if (strtolower($controller) === 'home'
                || strtolower($controller) === 'signin'
                || strtolower($controller) === 'register'
                || strtolower($controller) === 'raport'){
            if($auth)
                $controller = "Logout";
        }
        else{
            if(!$auth && !(strtolower($controller) === 'unsplash' && strtolower($action) === 'getuserphotopublic')
                        && !(strtolower($controller) === 'share' && strtolower($action) === 'photo')
                        && !(strtolower($controller) === 'tumblr' && strtolower($action) === 'getuserphotopublic')){
                http_response_code(401);
                exit(401);
            }
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
