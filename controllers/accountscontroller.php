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
            this->model->getAccounts($token);
        }

    }
}