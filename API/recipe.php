<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/DB.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Entity/Recipe.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Manager/RecipeManager.php';

$manager = new RecipeManager();
$result = $manager->getBySearch($_GET['search']);

if ($result) {

    $tab = [];

    foreach ($result as $recipe) {
        $tab[] = [
            'title' => $recipe->getTitle(),
            'art' => $recipe->getArt(),
            'ingredient' => nl2br($recipe->getIngredient()),
            'preparation' => nl2br($recipe->getPreparation()),
        ];
    }

    echo json_encode($tab);
}

