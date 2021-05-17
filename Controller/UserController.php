<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/Controller/RenderView.php';

class UserController {

    public function userConnect() {
        $render = new Render('connexion', 'PopCook connect');
    }

    public function userRegister() {
        $render = new Render('register', 'PopCook registration');
    }

}