<?php

class CollageView extends View
{
    function __construct(){
        parent::__construct("views/templates/collage.html");
    }

    function show(){
        $this->template = "views/templates/collage.html";
        try {
            return $this->output();
        } catch (Exception $e) {
        }
    }

}