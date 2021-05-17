<?php

// BDD
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/DB.php';

// Object
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Entity/Recette.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Entity/User.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Entity/Role.php';

// Controller
require_once $_SERVER['DOCUMENT_ROOT'] . '/Controller/RenderView.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Controller/HomeController.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Controller/RecetteController.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Controller/UserController.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Controller/RoleController.php';

//Manager
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Manager/RecetteManager.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Manager/UserManager.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Manager/RoleManager.php';

session_start();

if (isset($_GET['controller'])) {

    switch ($_GET['controller']) {

        case 'connexion' :
            $controller = new UserController();
            $controller->userConnect();
            break;
    }
}
else {
    $controller = new HomeController();
    $controller->homePage();
}

