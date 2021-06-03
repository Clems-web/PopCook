<div id="profileContainer">
    <div id="profileSettings">
        <ul>
            <li><a href="?controller=addArticle">Publier une nouvelle recette</a></li>
            <li><a href="?controller=updateUser">Modifier mes informations</a></li>
            <li><a href="?controller=DeleteUser">Supprimer mon compte</a></li>
        </ul>
    </div>
    <div id="profileContent">
        <h2>Vos publications :</h2>
        <?php
        $recipe = new RecipeManager();
        $recipeAuthor = $recipe->getByAuthor($_SESSION['user']);
        foreach ($recipeAuthor as $recipe) {?>
            <div class="recipes">
                <span class="spanTitle"><?= $recipe->getTitle();?></span>
                <p>
                    <span class="spanIngredient">Ingrédient :</span>
                    <br>
                    <?= nl2br($recipe->getIngredient());?>
                </p>
                <p>
                    <span class="spanPreparation">Préparation :</span>
                    <br>
                    <?= nl2br($recipe->getPreparation());?>
                </p>
            </div>
        <?php
        }
        ?>
    </div>
</div>
