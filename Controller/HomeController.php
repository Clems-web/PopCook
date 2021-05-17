<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/Controller/RenderView.php';

class HomeController {

    /**
     * Affiche la page home.
     */
    public function homePage() {
        $user = 'Anonymous';
        if(isset($_SESSION['user'])) {
            $user = $_SESSION['user'];
        }

        $render = new Render('home', 'PopCook home page');
    }

}