<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/DB.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Entity/Recipe.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Manager/RecipeManager.php';

header('Content-Type: application/json');

$manager = new RecipeManager();
$requestType = $_SERVER['REQUEST_METHOD'];

switch($requestType) {
    case 'POST':

        // Decoding our array changed into JSON from recipeComposerAjax.js
        $data = json_decode(file_get_contents('php://input'));
        $recipes = $manager->getBySearch($data[0]);

        $result = [];
        foreach ($recipes as $recipe) {
            $tab = explode('- ', $recipe->getIngredient());
            $array = [];
            foreach ($tab as $item) {
                if ($item !== "") {
                    $array[] = rtrim($item, " \n\r\t\v\0" );
                }
            }
            $result[] = $array;
        }

        $index = 0;
        $indexRecipe = [];
        foreach ($result as $ingredientList) {
            $find = true;
            foreach ($data as $ingredient) {
                if ($ingredient !== "") {
                    if (!in_array(rtrim($ingredient, " \n\r\t\v\0" ), $ingredientList)) {
                        $find = false;
                        break;
                    }
                    else {
                        $find = true;
                    }
                }
            }
            if ($find) {
                array_push($indexRecipe, $index);
            }
            $index++;
        }

        $recipesFound = [];

        foreach ($indexRecipe as $item) {
            $recipesFound[] = $recipes[$item];
        }

        $tab = [];
        foreach ($recipesFound as $recipe) {
            $tab[] = [
                'title' => $recipe->getTitle(),
                'art' => $recipe->getArt(),
                'ingredient' => nl2br($recipe->getIngredient()),
                'preparation' => nl2br($recipe->getPreparation()),
            ];
        }

        echo json_encode($tab);
}

