<?php

class Render {

    /**
     * Render constructor.
     * @param string $view
     * @param string $title
     * @param array|null $var
     */
    public function __construct(string $view, string $title, array $var = null) {
        ob_start();
        require_once $_SERVER['DOCUMENT_ROOT'] . "/View/".$view.".view.php";
        $html = ob_get_clean();
        require_once $_SERVER['DOCUMENT_ROOT'] . '/View/_partials/base.view.php';
    }

}



