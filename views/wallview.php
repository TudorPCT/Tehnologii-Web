<?php

class WallView extends View
{
    function __construct(){
        parent::__construct("views/templates/wall.tpl");
    }

    function show(){
        $this->template = "views/templates/wall.tpl";
        try {
            return $this->output();
        } catch (Exception $e) {
        }
    }

}