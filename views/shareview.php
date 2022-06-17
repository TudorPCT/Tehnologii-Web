<?php

class ShareView extends View
{
    function __construct(){
        parent::__construct("views/templates/photo.tpl");
    }

    function show($info){
        try {
            $this->data = $info;
            return $this->output();
        } catch (Exception $e) {
        }
    }
}