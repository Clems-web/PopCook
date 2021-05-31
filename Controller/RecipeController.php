<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/Controller/RenderView.php';

class RecipeController {

    /**
     * Display addRecipe view
     */
    public function addRecipe() {
        $render = new Render('addRecipe', 'Ajouter une nouvelle recette');
    }

    /**
     * Display getRecipe view
     */
    public function getRecipe() {
        $render = new Render('recipe', 'Trouver une recette');
    }

    /**
     * Display "What's in my fridge" view
     */
    public function findRecipe() {
        $render = new Render('composeRecipe', "What's in my fridge");
    }
}