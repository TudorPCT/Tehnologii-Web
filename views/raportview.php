<?php

class RaportView extends View
{
    function __construct(){
        parent::__construct("views/templates/raport.tpl");
    }

    function show(){
        try {
            return $this->output();
        } catch (Exception $e) {
        }
    }
}