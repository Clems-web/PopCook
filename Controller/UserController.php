<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/Controller/RenderView.php';

class UserController {

    /**
     * Display connect form view
     */
    public function userConnect() {
        $render = new Render('connexion', 'PopCook connect');
    }

    /**
     * Display register form view
     */
    public function userRegister() {
        $render = new Render('register', 'PopCook registration');
    }

    /**
     * Display user's profile
     */
    public function userProfile() {
        $render = new Render('profile', 'Your profile');
    }

    /**
     * Display form used to modify user's informations
     */
    public function userUpdate() {
        $render = new Render('updateUser', 'Modifiations de vos informations');
    }

    /**
     * Display form used to delete user's informations
     */
    public function userDelete() {
        $render = new Render('deleteUser', 'Suppression de votre compte');
    }

}