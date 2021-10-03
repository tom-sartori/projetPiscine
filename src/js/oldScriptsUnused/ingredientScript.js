const controller = 'Ingredient';
const urlRouterModel = 'router/routerModel.php';

const divCreation = document.getElementById('divCreate' + controller);
const divList = document.getElementById('divList' + controller);


window.onload = function () {
    console.log('loaded');
    ajaxList();
}

// FIXME Meme fonction que dans allergenScript.
// FIXME Permet d'afficher le nom des éléments dans une liste et gérer les id.
// FIXME A voir suivant les besoins d'affichages d'ingrédient ou autre.
/**
 * Create and add to the html page a list of recipes.
 * For each element, are created an input, an update button and a delete button.
 * Function usually used after the function ajaxList()
 *
 * @param ajaxResponse
 */
function showList(ajaxResponse) {
    if (ajaxResponse.responseText === "null") {
        // Correspond to base empty or error.
        console.log(ajaxResponse);
        return;
    }
    let responseParsed = JSON.parse(ajaxResponse.responseText);
    // console.log(reqParsed);

    cleanElement(divList);

    let ul = document.createElement('ul');
    divList.appendChild(ul);


    for (let elt of responseParsed) {
        let id = elt.idIngredient;
        let nom = elt.nomIngredient;

        if (id != 0) {  // N'affiche pas l'element 0 car correspond à 'Aucun'.

            let li = document.createElement('li');
            li.id = 'li' + controller + id;

            li.appendChild(createInputElement(id, nom));
            li.appendChild(createButtonUpdate(id));
            li.appendChild(createButtonDelete(id));

            ul.appendChild(li);
        }
    }
}