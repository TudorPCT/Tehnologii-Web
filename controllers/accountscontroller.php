<?php

class AccountsController extends Controller
{
    function __construct(){
        parent::__construct();
    }
    function getAccounts(){
        $headers = apache_request_headers();
        $token = getBearerToken($headers);
        if ($token === null || !verify_token($token)) {
            http_response_code(401);
            exit(401);
        }else{
            $this->model->getAccounts($token);
        }

    }
    
        function addUnsplashAccount(){
  /*      $headers = apache_request_headers();
        $token = getBearerToken($headers);
        if ($token === null || !verify_token($token)) {
            http_response_code(401);
            exit(401);
        }else{

        }*/

        header('Location: https://unsplash.com/oauth/authorize?client_id=9XFuoEpXqAkmsha8In-94JPBM9v5nueRYmKKF5uhjTM&redirect_uri=https%3A%2F%2Fsocialmediabox.herokuapp.com&response_type=code&scope=public');
        die();
    }
}
