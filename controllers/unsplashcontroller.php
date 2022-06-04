<?php

class UnsplashController extends Controller
{
    function __construct(){
        parent::__construct();
    }

    function getCode(){
        include ("config.php");


        $ret = [
            'result' => 'OK',
        ];
        print json_encode($ret);
    }
}