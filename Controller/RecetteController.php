<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/Controller/RenderView.php';

class RecetteController {

    public function addRecipe() {
        $render = new Render('addRecipe', 'Ajouter une nouvelle recette');
    }

    public function getRecipe() {
        $render = new Render('recipe', 'Trouver une recette');
    }

    public function findRecipe() {
        $render = new Render('composeRecipe', "What's in my fridge");
    }


}