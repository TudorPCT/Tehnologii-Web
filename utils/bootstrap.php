<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: *");


    //http://localhost:8080/Tehnologii-Web/index.php?load=Home/index
    $auth = false;

    $controller = "Home";
    $action = "index";

    $token = null;
    if (isset($_COOKIE['jwt'])) {
        $token = $_COOKIE['jwt'];

        if(verify_token($token)) {
            $auth = true;
            $controller = "accounts";
            $action = "index";
        }
    }

    if (isset($_GET['load'])) {
        $params = array();
        $params = explode("/", $_GET['load']);

        $controller = ucwords($params[0]);

        if (isset($params[1]) && !empty($params[1])) {
            $action = $params[1];
        } else
            if (strtolower($controller) !== 'home'
                && strtolower($controller) !== 'signin'
                && strtolower($controller) !== 'register'
                && strtolower($controller) !== 'unsplash'
                && !$auth) {

                http_response_code(401);
                exit(401);
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
        $load->$action();
    }
    else
    {
        http_response_code(404);
        exit(404);
    }

?>
