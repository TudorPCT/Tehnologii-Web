<?php

class UnsignedUserView extends View
{
    function __construct(){
        parent::__construct("views/templates/home.html");
    }

    function show(){
        $this->template = "views/templates/home.tpl";
        try {
            return $this->output();
        } catch (Exception $e) {
        }
    }
    function showSignIn(){
        $this->template = "views/templates/signin.tpl";
        try {
            return $this->output();
        } catch (Exception $e) {
        }
    }
}
?>