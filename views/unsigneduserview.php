<?php

class UnsignedUserView extends View
{
    function __construct(){
        parent::__construct("views/templates/home.tpl");
    }

    function show(){
        return $this->output();
    }
}
?>