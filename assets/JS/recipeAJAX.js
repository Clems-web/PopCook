let inputSearch = document.getElementById('inputSearch');
let buttonSearch = document.getElementById('buttonSearch');
let divRecipeContainer = document.getElementById('recipes');

// Protection against potential attack passing by URL parameters get when using Ajax request
function removeTags(str) {
    if ((str===null) || (str==='')) {
        return false;
    }
    else {
        str = str.toString();
    }
    return str.replace( /(<([^>]+)>)/ig, '');
}


// Ajax request for input search in recipe page
function getRecipe(e){

    e.preventDefault();

    //Reset container innerHTML
    divRecipeContainer.innerHTML = "";

    // AJAX request to connect to server and manager.php
    const xhr = new XMLHttpRequest();
    xhr.open("GET", "./API/recipe.php?search=" + removeTags(inputSearch.value) + "");

    // Exploit JSON and display them in HTML format
    xhr.onload = function(){
        const result = JSON.parse(xhr.responseText);
            for (let recipe of result) {
                divRecipeContainer.innerHTML += `
                <div class="recipe">
                    <h2 class="spanTitle">${recipe.title} de ${recipe.art}</h2>
                    <span class="subTitle">Ingrédients :</span><br>
                    <p class="paraIngredient">${recipe.ingredient}</p>
                    <span class="subTitle">Préparation :</span><br>
                    <p class="paraPreparation">${recipe.preparation}</p>
                </div>
                `;
            }
    }

    // Send request
    xhr.send();
}

buttonSearch.addEventListener('click', getRecipe);

// Ajax request for each buttons in recipe page
let buttonsCategory = document.getElementsByClassName('buttonCategory');

for (let x = 0; x < buttonsCategory.length; x++ ) {

    buttonsCategory[x].addEventListener('click', function () {

        //Reset container innerHTML
        divRecipeContainer.innerHTML = "";

        // AJAX request to connect to server and manager.php
        const xhr = new XMLHttpRequest();
        xhr.open("GET", "./API/recipe.php?search=" + buttonsCategory[x].innerHTML + "");

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
                `;
            }
        }

        // Send request
        xhr.send();
    });
}


