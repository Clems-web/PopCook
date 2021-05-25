<form id="formAddRecipe" action="./addRecipe.php" method="POST">
    <div class="inputBlock">
        <input type="text" name="title" placeholder="Titre">
        <select name="recipeCategory" id="categorySelect" form="formAddRecipe" placeholder="">
            <option value="Film">Film</option>
            <option value="Série">Série</option>
            <option value="Manga/Anime">Manga/Anime</option>
            <option value="Roman/BD/Comics">Roman/BD/Comics</option>
        </select>
    </div>
    <div class="inputBlock">
        <textarea name="ingredientList" placeholder="Liste des ingrédients" cols="30" rows="10"></textarea>
    </div>
    <div class="inputBlock">
        <textarea name="recipePreparation" placeholder="Préparation" cols="60" rows="20"></textarea>
    </div>
    <button id="buttonSend" type="submit">Publier</button>
</form>
