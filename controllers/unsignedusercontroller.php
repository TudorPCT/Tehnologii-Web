<?php

class UnsignedUserController extends Controller
{
    function loadHomePage(){
        $vizualizare = $this->view->show();
        echo $vizualizare;
    }

    function loadSignInPage(){
        $vizualizare = $this->view->showSignIn();
        echo $vizualizare;
    }
}

?>