<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/DB.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Entity/User.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Entity/Recette.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Manager/RecetteManager.php';

?>

<div id="profileContainer">
    <div id="profileSettings">
        <ul>
            <li>Change username</li>
            <li>Change password</li>
            <li>Change mail</li>
        </ul>
    </div>
    <div id="profileContent">
        <?php
        $recette = new RecetteManager();
        $recetteAuthor = $recette->getByAuthor($_SESSION['user']);
        foreach ($recetteAuthor as $recipe) {?>
            <div class="recettes">
                <span><?= $recipe->getTitle();?></span>
                <p><?= $recipe->getContent();?></p>
            </div>
        <?php
        }
        ?>
    </div>
</div>
