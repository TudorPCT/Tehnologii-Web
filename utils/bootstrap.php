<?php

    //http://localhost:8080/mpic/index.php?load=UnsignedUser/loadHomePage
    $controller = "UnsignedUser";
    $action = "loadHomePage";

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

    $controller .= 'Controller';
    $load = new $controller();

    if (method_exists($load, $action))
    {
        $load->$action();
    }
    else
    {
        die('Invalid method. Please check the URL.');
    }
?>