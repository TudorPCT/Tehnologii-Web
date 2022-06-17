<?php

abstract class Controller
{
    protected $model;

    public function __construct()
    {
        $modelName = str_replace("Controller", "Model", get_class($this));
        if (!class_exists($modelName, true)) {
            echo "$modelName undefined -> halt !";
            exit();
        };

        $this->model = new $modelName;
    }

}

?>