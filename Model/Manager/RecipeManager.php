<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/DB.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Entity/Recipe.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Entity/User.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Manager/UserManager.php';

class RecipeManager {

    /**
     * Get all Recipe
     * @return array
     */
    public function getAllRecipe(): array {
        $recipe = [];
        $request = DB::getInstance()->prepare("SELECT * FROM recipe");
        $result = $request->execute();
        if ($result) {

            $data = $request->fetchAll();

            foreach($data as $recipe_data) {
                $recipe[] = new Recipe(
                    $recipe_data['id'],
                    $recipe_data['title'],
                    $recipe_data['ingredient'],
                    $recipe_data['preparation'],
                    $recipe_data['category'],
                    $recipe_data['user_fk']
                );
            }
        }
        return $recipe;
    }

    /**
     * Get recipe by Id
     * @param int $id
     * @return array|Recipe
     */
    public function getById(int $id){
        $recipe = [];
        $request = DB::getInstance()->prepare("SELECT * FROM recipe AS r WHERE r.id = :id");
        $request->bindValue(':id', $id);

        $result = $request->execute();

        if($result) {

            $recipe_data = $request->fetch();

            if($recipe_data) {
                $recipe = new Recipe(
                    $recipe_data['id'],
                    $recipe_data['title'],
                    $recipe_data['ingredient'],
                    $recipe_data['preparation'],
                    $recipe_data['category'],
                    $recipe_data['user_fk']
                );
            }
        }
        return $recipe;
    }

    /**
     * Get recipes by search
     * @param string $string
     * @return array
     */
    public function getBySearch(string $string): array {
        $recipe = [];
        $request = DB::getInstance()->prepare("
            SELECT * FROM recipe 
                WHERE title LIKE :string 
                   OR ingredient LIKE :string 
                   OR preparation LIKE :string 
                   OR category LIKE :string
        ");
        $request->bindValue(':string', '%'.$string.'%');

        $result = $request->execute();
        if($result) {
            $recipe_data = $request->fetchAll();
            if($recipe_data) {
                foreach ($recipe_data as $recipe_part) {
                    $recipe[] = new Recipe(
                        $recipe_part['id'],
                        $recipe_part['title'],
                        $recipe_part['ingredient'],
                        $recipe_part['preparation'],
                        $recipe_part['category'],
                        $recipe_part['user_fk']
                    );
                }
            }
        }
        return $recipe;
    }


    /**
     * Get Recipes by Author
     * @param User $user
     * @return array
     */
    public function getByAuthor(User $user): array {
        $recipe = [];
        $request = DB::getInstance()->prepare("
        SELECT * FROM recipe WHERE user_fk = :id
        ");
        $request->bindValue(':id', $user->getId());
        $request->execute();

        if ($request->execute()) {
            $data = $request->fetchAll();
            if ($data) {
                foreach ($data as $recipe_data) {
                    $recipe[] = new Recipe(
                        $recipe_data['id'],
                        $recipe_data['title'],
                        $recipe_data['ingredient'],
                        $recipe_data['preparation'],
                        $recipe_data['category'],
                        $recipe_data['user_fk']
                    );
                }
            }
        }
        return $recipe;
    }

    /**
     * Insert User in DB or update him/her
     * @param Recipe $recipe
     */
    public function saveRecipe(Recipe $recipe) {
        if ($recipe->getId() === 0 || $recipe->getId() == null) {
            $request = DB::getInstance()->prepare("
                INSERT INTO recipe(title, ingredient, preparation, category,user_fk) 
                VALUES (:title, :ingredient, :preparation, :category,:user_fk)
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

        else {
            $request = DB::getInstance()->prepare("
            UPDATE recipe 
                SET title = :title, ingredient = :ingredient, :preparation = preparation, category = :category, user_fk = :user_fk 
                    WHERE id = :id
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

    /**
     * Delete Recipe
     * @param Recipe $recipe
     */
    public function delRecipe(Recipe $recipe) {
        $request = DB::getInstance()->prepare("
        DELETE FROM recipe WHERE id = :id;
        ");
        $request->bindValue('id', $recipe->getId());

        $result = $request->execute();
        if ($result) {
            echo "Recipe deleted";
        }
    }

}