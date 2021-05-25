<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/DB.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Entity/Recette.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Manager/RecetteManager.php';

$manager = new RecetteManager();
$result = $manager->getBySearch($_GET['search']);

if ($result) {

    $tab = [];

    foreach ($result as $recipe) {
        $tab[] = ['title' => $recipe->getTitle(), 'ingredient' => $recipe->getIngredient(), 'preparation' => $recipe->getPreparation()];
    }
    echo json_encode($tab);
}

