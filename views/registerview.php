<?php

class RegisterView extends View
{
    function __construct(){
        parent::__construct("views/templates/register.tpl");
    }

    function show(){
        try {
            return $this->output();
        } catch (Exception $e) {
        }
    }
}