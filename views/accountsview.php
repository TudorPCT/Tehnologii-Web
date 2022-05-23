<?php

class AccountsView extends View
{
    function __construct(){
        parent::__construct("views/templates/accounts.tpl");
    }

    function show(){
        $this->template = "views/templates/accounts.tpl";
        try {
            return $this->output();
        } catch (Exception $e) {
        }
    }

}