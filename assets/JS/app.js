let inputSearch = document.getElementById('inputSearch');
let buttonSearch = document.getElementById('buttonSearch');
let divRecipeContainer = document.getElementById('recipes');



function getRecipe(){

    // AJAX request to connect to server and manager.php
    const xhr = new XMLHttpRequest();
    xhr.open("GET", "../../API/recipe.php?search="+inputSearch.value+"");

    // Exploit JSON and display them in HTML format
    xhr.onload = function(){
        const result = JSON.parse(xhr.responseText);
            for (let recipe of result) {
                console.log(result);
                divRecipeContainer.innerHTML +=
                `
                <div class="recipe">
                  <h2 class="spanTitle">${recipe.title}</h2>
                  <span class="spanIngredient">${recipe.ingredient}</span>
                  <span class="spanPreparation">${recipe.preparation}</span>
                </div>
                `
            }

    }

    // Send request
    xhr.send();
}

buttonSearch.addEventListener('click', getRecipe);