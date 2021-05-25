<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/DB.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Entity/Recette.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Entity/User.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Manager/UserManager.php';

class RecetteManager {

    // Get all recipes
    public function getAllRecipe() {
        $recipe = [];
        $request = DB::getInstance()->prepare("SELECT * FROM recette");
        $result = $request->execute();
        if ($result) {
            $data = $request->fetchAll();
            foreach($data as $recipe_data) {
                $recipe[] = new Recette($recipe_data['id'], $recipe_data['title'], $recipe_data['ingredient'], $recipe_data['preparation'], $recipe_data['category'],$recipe_data['user_fk']);
            }
        }
        return $recipe;
    }

    // Get recipe by id
    public function getById(int $id){
        $recipe = [];
        $request = DB::getInstance()->prepare("SELECT * FROM recette AS r WHERE r.id = :id");
        $request->bindValue(':id', $id);
        $result = $request->execute();
        if($result) {
            $recipe_data = $request->fetch();
            if($recipe_data) {
                $recipe = new Recette($recipe_data['id'], $recipe_data['title'], $recipe_data['ingredient'], $recipe_data['preparation'], $recipe_data['category'],$recipe_data['user_fk']);
            }
        }
        return $recipe;
    }

    // Get recipe by Search
    public function getBySearch(string $string){
        $recipe = [];
        $request = DB::getInstance()->prepare("SELECT * FROM recette WHERE title LIKE '%$string%'");
        $result = $request->execute();
        if($result) {
            $recipe_data = $request->fetch();
            if($recipe_data) {
                $recipe[] = new Recette($recipe_data['id'], $recipe_data['title'], $recipe_data['ingredient'], $recipe_data['preparation'], $recipe_data['category'],$recipe_data['user_fk']);
            }
        }
        return $recipe;
    }

    // Get recipe by Object User->getId()
    public function getByAuthor(User $user) {
        $recipe = [];
        $request = DB::getInstance()->prepare("
        SELECT * FROM recette WHERE user_fk = :id
        ");
        $request->bindValue(':id', $user->getId());
        $request->execute();

        if ($request->execute()) {
            $data = $request->fetchAll();
            if ($data) {
                foreach ($data as $recipe_data) {
                    $recipe[] = new Recette($recipe_data['id'], $recipe_data['title'], $recipe_data['ingredient'], $recipe_data['preparation'], $recipe_data['category'],$recipe_data['user_fk']);
                }
            }
        }
        return $recipe;
    }

    // If article's Id is null or equal to 0, that's an insert into DB
    public function saveRecipe(Recette $recipe) {
        if ($recipe->getId() === 0 ||$recipe->getId() == null) {
            $request = DB::getInstance()->prepare("
        INSERT INTO recette(title, ingredient, preparation, category,user_fk) VALUES (:title, :ingredient, :preparation, :category,:user_fk)
        ");

            $request->bindValue(':title', $recipe->getTitle());
            $request->bindValue(':ingredient', $recipe->getIngredient());
            $request->bindValue(':preparation', $recipe->getPreparation());
            $request->bindValue(':category', $recipe->getCategory());
            $request->bindValue(':user_fk', $recipe->getUserFk());

            $request->execute();

            if ($request) {
                echo "Recipe saved in DB";
            }
        }

        // Else it's an update of the article
        else {
            $request = DB::getInstance()->prepare("
            UPDATE recette SET title = :title, ingredient = :ingredient, :preparation = preparation, category = :category,user_fk = :user_fk WHERE id = :id
            ");

            $request->bindValue(':title', $recipe->getTitle());
            $request->bindValue(':ingredient', $recipe->getIngredient());
            $request->bindValue(':preparation', $recipe->getPreparation());
            $request->bindValue(':category', $recipe->getCategory());
            $request->bindValue(':user_fk', $recipe->getUserFk());
            $request->bindValue(':id', $recipe->getId());

            $request->execute();

            if ($request) {
                echo "Recipe updated";
            }
        }

    }

    // Deleted article
    public function delRecipe(Recette $recipe) {
        $request = DB::getInstance()->prepare("
        DELETE FROM recette WHERE id = :id;
        ");
        $request->bindValue('id', $recipe->getId());

        $result = $request->execute();
        if ($result) {
            echo "Recipe deleted";
        }
    }

}