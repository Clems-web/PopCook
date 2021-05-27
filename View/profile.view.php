<div id="profileContainer">
    <div id="profileSettings">
        <ul>
            <li><a href="?controller=addArticle">Publier une nouvelle recette</a></li>
            <li><a href="?controller=updateUser">Modifier mes informations</a></li>
        </ul>
    </div>
    <div id="profileContent">
        <h2>Vos articles :</h2>
        <?php
        $recette = new RecetteManager();
        $recetteAuthor = $recette->getByAuthor($_SESSION['user']);
        foreach ($recetteAuthor as $recipe) {?>
            <div class="recettes">
                <span class="spanTitle"><?= $recipe->getTitle();?></span>
                <p>
                    <span class="spanIngredient">Ingrédient :</span>
                    <br>
                    <?= nl2br($recipe->getIngredient());?>
                </p>
                <p>
                    <span class="spanPreparation">Preparation :</span>
                    <br>
                    <?= nl2br($recipe->getPreparation());?>
                </p>
            </div>
        <?php
        }
        ?>
    </div>
</div>
