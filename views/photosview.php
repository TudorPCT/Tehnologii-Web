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

    function editPhoto(){
        $this->template = "views/templates/editPhoto.tpl";
        try {
            $this->data = ["photo" => "./views/templates/img/naturephoto.jpg"];
            return $this->output();
        } catch (Exception $e) {
        }
    }

}