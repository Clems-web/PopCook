<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/Controller/RenderView.php';

class HomeController {

    /**
     * Display homepage
     */
    public function homePage() {

        $user = 'Anonymous';

        if(isset($_SESSION['user'])) {
            $user = $_SESSION['user'];
        }

        $render = new Render('home', 'PopCook home page');
    }

}