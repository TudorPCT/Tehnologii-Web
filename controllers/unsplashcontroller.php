<?php

class UnsplashController extends Controller
{
    function __construct(){
        parent::__construct();
    }

    function getCode(){
        if (isset($_GET['code'])){
            $code = $_GET['code'];
            echo $code;
        }
    }
}