<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/DB.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Entity/Recipe.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Manager/RecipeManager.php';

session_start();

$db = new DB();

if (isset($_SESSION['user'])) {
    if (isset($_POST['title'], $_POST['art'], $_POST['ingredientList'], $_POST['recipePreparation'], $_POST['recipeCategory'])) {

        if ((!empty($_POST['title'])) && (!empty($_POST['art'])) && (!empty($_POST['ingredientList'])) && (!empty($_POST['recipePreparation']))) {
                $recipe = new Recipe(
                    null,
                    $db->cleanInput($_POST['title']),
                    $db->cleanInput($_POST['art']),
                    $db->cleanInput($_POST['ingredientList']),
                    $db->cleanInput($_POST['recipePreparation']),
                    $db->cleanInput($_POST['recipeCategory']),
                    $_SESSION['user']->getId()
                );
                (new RecipeManager())->saveRecipe($recipe);
        }

    }
}

header('Location: ../index.php');

