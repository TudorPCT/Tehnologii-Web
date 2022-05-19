<?php

class SigninView extends View
{
    function __construct(){
        parent::__construct("views/templates/signin.tpl");
    }

    function show(){
        try {
            return $this->output();
        } catch (Exception $e) {
        }
    }
}