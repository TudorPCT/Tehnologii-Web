<?php

class UnsignedUserView extends View
{
    function __construct(){
        parent::__construct("views/templates/home.html");
    }

    function show(){
        try {
            return $this->output();
        } catch (Exception $e) {
        }
    }
    function showSignIn(){
        try {
            return $this->output();
        } catch (Exception $e) {
        }
    }
}
?>