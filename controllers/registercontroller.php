<?php

class RegisterController extends Controller{
    function __construct(){
        parent::__construct();
    }


    function index(){
        $vizualizare = $this->view->show();
        echo $vizualizare;
    }

    function signup(){
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $password=$_POST['password'];
        if(!$this->model->check_user($email)){
            echo 'This User Already Exists';
        }
        else{
            $data = array(
                'id' =>null,
                'first_name' =>$_POST['first_name'],
                'last_name' =>$_POST['last_name'],
                'email' =>$_POST['email'],
                'password' =>$_POST['password']
            );
            $this->model->insert_user($data);
        }
    }

}