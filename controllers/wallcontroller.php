<?php

class WallController extends Controller
{
    function __construct(){
        parent::__construct();
    }
    function getWall(){
        $this->model->getWall($token);
    }
}