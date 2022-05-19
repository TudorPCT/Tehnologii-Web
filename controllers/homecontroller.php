<?php

class HomeController extends Controller
{
    function __construct(){
        parent::__construct();
    }

    function index(){
        $vizualizare = $this->view->show();
        echo $vizualizare;
    }
}

?>