<?php

class PhotosView extends View
{
    function __construct(){
        parent::__construct("views/templates/photos.tpl");
    }

    function show(){
        $this->template = "views/templates/photos.tpl";
        try {
            return $this->output();
        } catch (Exception $e) {
        }
    }

}