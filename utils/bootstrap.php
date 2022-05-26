<?php

    require_once HOME . DS . 'utils' . DS . 'token.php';
    //http://localhost:8080/Tehnologii-Web/index.php?load=Home/index
    $controller = "Home";
    $action = "index";

    if (isset($_GET['load']))
    {
        $params = array();
        $params = explode("/", $_GET['load']);

        $controller = ucwords($params[0]);

        if (isset($params[1]) && !empty($params[1]))
        {
            $action = $params[1];
        }
    }

    $token = null;
    $headers = apache_request_headers();
    if(isset($headers['Authorization'])){
        $matches = explode(" ", $headers['Authorization']);
        if(isset($matches[0]) && $matches[0] === 'Bearer' && isset($matches[1])){
            $token = $matches[1];
        }
    }

    if(strtolower($controller) !== 'home'
        && strtolower($controller) !== 'signin'
        && strtolower($controller) !== 'register'
        && !verify_token($token) ){

        http_response_code(401);
        exit(401);
    }

    $controller .= 'Controller';

    if(!class_exists($controller)){
        http_response_code(404);
        exit(404);
    }

    $load = new $controller();
    if (method_exists($load, $action))
    {
        $load->$action();
    }
    else
    {
        http_response_code(404);
        exit(404);
    }

?>