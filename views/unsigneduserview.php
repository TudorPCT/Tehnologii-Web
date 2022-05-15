<?php

class UnsignedUserView extends View
{
    function __construct(){
        parent::__construct("views/templates/home.tpl");
    }

    function show(){
        try {
            return $this->output();
        } catch (Exception $e) {
        }
    }
}
?>