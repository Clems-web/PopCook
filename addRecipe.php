<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/DB.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Entity/Recipe.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Manager/RecipeManager.php';

session_start();

if (isset($_SESSION['user'])) {
    if (isset($_POST['title'], $_POST['ingredientList'], $_POST['recipePreparation'], $_POST['recipeCategory'])) {
        $recipe = new Recipe(
            null,
            $_POST['title'],
            $_POST['ingredientList'],
            $_POST['recipePreparation'],
            $_POST['recipeCategory'],
            $_SESSION['user']->getId()
        );
        (new RecipeManager())->saveRecipe($recipe);
    }
}

header('Location: index.php');