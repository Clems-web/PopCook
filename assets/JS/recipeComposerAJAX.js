let buttonsSearchWhat = document.getElementById('buttonSearchWhat');
let inputSearchWhat = document.getElementById('inputSearchWhat');
let divRecipeContainer = document.getElementById('recipes');

buttonsSearchWhat.addEventListener('click', function () {

    //Reset container innerHTML
    divRecipeContainer.innerHTML = "";

    // AJAX request to connect to server and manager.php
    const xhr = new XMLHttpRequest();
    let demand = inputSearchWhat.value.split(', ');
    xhr.open("POST", "./API/recipeWhat.php");

    // Exploit JSON and display them in HTML format
    xhr.onload = function(){
        const result = JSON.parse(xhr.responseText);
        for (let recipe of result) {
            divRecipeContainer.innerHTML += `
            <div class="recipe">
                <h2 class="spanTitle">${recipe.title}</h2>
                <span class="subTitle">Ingrédients :</span><br>
                <p class="paraIngredient">${recipe.ingredient}</p>
                <span class="subTitle">Préparation :</span><br>
                <p class="paraPreparation">${recipe.preparation}</p>
            </div>
            `
        }
    }

    // Send request
    xhr.send(JSON.stringify(demand));
});
