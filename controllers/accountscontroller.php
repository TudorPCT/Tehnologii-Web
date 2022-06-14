<?php

class AccountsController extends Controller
{
    function __construct(){
        parent::__construct();
    }
    function getAccounts(){
        $token = $_COOKIE["jwt"];
        $this->model->getAccounts($token);

    }
    
        function addUnsplashAccount(){
        header('Location: https://unsplash.com/oauth/authorize?client_id=9XFuoEpXqAkmsha8In-94JPBM9v5nueRYmKKF5uhjTM&redirect_uri=https%3A%2F%2Fsocialmediabox.herokuapp.com&response_type=code&scope=public');
        die();
    }
}
