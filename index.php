<?php

// BDD
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/DB.php';

// Object
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Entity/Recipe.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Entity/User.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Entity/Role.php';

// Controller
require_once $_SERVER['DOCUMENT_ROOT'] . '/Controller/RenderView.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Controller/HomeController.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Controller/RecipeController.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Controller/UserController.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Controller/RoleController.php';

//Manager
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Manager/RecipeManager.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Manager/UserManager.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Manager/RoleManager.php';

session_start();

if (isset($_GET['controller'])) {

    switch ($_GET['controller']) {

        case 'connexion' :
            $controller = new UserController();
            $controller->userConnect();
            break;

        case 'registration' :
            $controller = new UserController();
            $controller->userRegister();
            break;

        case 'profile' :
            $controller = new UserController();
            $controller->userProfile();
            break;

        case 'addArticle' :
            $controller = new RecipeController();
            $controller->addRecipe();
            break;

        case 'updateUser' :
            $controller = new UserController();
            $controller->userUpdate();
            break;

        case 'recipe' :
            $controller = new RecipeController();
            $controller->getRecipe();
            break;

        case 'composer' :
            $controller = new RecipeController();
            $controller->findRecipe();
            break;
    }
}
else {
    $controller = new HomeController();
    $controller->homePage();

}

