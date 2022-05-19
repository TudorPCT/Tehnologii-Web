<?php

class HomeView extends View
{
    function __construct(){
        parent::__construct("views/templates/home.tpl");
    }

    function show(){
        $this->template = "views/templates/home.tpl";
        try {
            return $this->output();
        } catch (Exception $e) {
        }
    }

}
?>