<?php

class UnsignedUserController extends Controller
{
    function __construct(){
        parent::__construct();
    }

    function index(){
        $vizualizare = $this->view->show();
        echo $vizualizare;
    }

    function loadSignInPage(){
        $vizualizare = $this->view->showSignIn();
        echo $vizualizare;
    }

    function loadRegisterPage(){
        $vizualizare = $this->view->showRegister();
        echo $vizualizare;
    }
}

?>