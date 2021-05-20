<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/DB.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Entity/Recette.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Manager/RecetteManager.php';

session_start();

if (isset($_SESSION['user'])) {
    if (isset($_POST['title'], $_POST['ingredientList'], $_POST['recipePreparation'], $_POST['recipeCategory'])) {
        $recipe = new Recette(null, $_POST['title'], $_POST['ingredientList'], $_POST['recipePreparation'], $_POST['recipeCategory'], $_SESSION['user']->getId());
        $recipeManager = new RecetteManager();
        $recipeManager->saveRecipe($recipe);
    }
}

header('location: index.php');