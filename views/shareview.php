<?php

class ShareView extends View
{
    function __construct(){
        parent::__construct("views/templates/photoPublic.tpl");
    }

    function showPrivate($info){
        $this->template = "views/templates/photoPrivate.tpl";
        try {
            $this->data = $info;
            return $this->output();
        } catch (Exception $e) {
        }
    }

    function showPublic($info){
        $this->template = "views/templates/photoPublic.tpl";
        try {
            $this->data = $info;
            return $this->output();
        } catch (Exception $e) {
        }
    }
}