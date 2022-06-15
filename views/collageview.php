<?php

class CollageView extends View
{
    function __construct(){
        parent::__construct("views/templates/collage.tpl");
    }

    function show(){
        $this->template = "views/templates/collage.tpl";
        try {
            return $this->output();
        } catch (Exception $e) {
        }
    }

}