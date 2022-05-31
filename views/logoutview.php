<?php

class LogoutView extends View
{
    function __construct(){
        parent::__construct("views/templates/logout.tpl");
    }

    function show(){
        try {
            return $this->output();
        } catch (Exception $e) {
        }
    }
}