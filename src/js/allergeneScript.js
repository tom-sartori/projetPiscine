const controller = 'Allergene';
const urlRouterModel = 'router/routerModel.php';

const divCreation = document.getElementById('divCreate' + controller);
const divList = document.getElementById('divList' + controller);

// TODO Faire des get de ces varaibles dans generalScript, afin d'avoir des id html génériques à toutes les pages.
const idInputCreation = getPrefixIdInput() + 'Creation';
const idButtonCreation = 'buttonCreate' + controller;


window.onload = function () {
    showCreation();
    ajaxList();
}


// FIXME Utilise encore routerModelAllergene.php.
// FIXME Devra utiliser routerModel.php.
/**
 * Make an ajax request to update an allergen on the db.
 * Refresh the page with ajaxList after that.
 *
 * N.B. : ajaxPost(...) is in generalScript.js.
 * @param idAllergene
 * @param nomAllergene
 */
function ajaxUpdate (idAllergene, nomAllergene) {
    ajaxPost('router/routerModelAllergene.php','controller=' + controller + '&request=update&valueId=' + idAllergene + '&valueNom=' + nomAllergene, ajaxList);
}

// FIXME Utilise encore routerModelAllergene.php.
// FIXME Devra utiliser routerModel.php.
/**
 * Make an ajax request to create an allergen on the db.
 * Refresh the page with ajaxList after that.
 *
 * N.B. : ajaxPost(...) is in generalScript.js.
 * @param nomAllergene
 */
function ajaxSave (nomAllergene) {
    ajaxPost('router/routerModelAllergene.php','controller=' + controller + '&request=save&valueNom=' + nomAllergene, refreshPage);
}

// FIXME Meme fonction que dans recetteScript.
// FIXME Permet d'afficher le nom des éléments dans une liste et gérer les id.
// FIXME A voir suivant les besoins d'affichages d'ingrédient ou autre.
/**
 * Create and add to the html page a list of allergens.
 * For each allergen, are created an input, an update button and a delete button.
 * Function usually used after the function ajaxList()
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
        let id = elt.idAllergene;
        let nom = elt.nomAllergene;

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

/**
 * Create and add to the html page a label, input and button, used to add an allergen to the db.
 */
function showCreation () {
    cleanElement(divCreation);

    let label = document.createElement('label');
    label.htmlFor = idInputCreation;
    label.innerText = 'Ajouter un allergène : ';

    let input = createInput(idInputCreation, '', 'text', false);
    input.placeholder = 'Nom d\'un nouvel allergène';
    input.onkeyup = function (event) {
        if (input.value.length !== 0 && event.key === 'Enter') {
            ajaxSave(input.value);
        }
    }

    let buttonSubmit = createButton(idButtonCreation, 'Valider', 'submit');
    buttonSubmit.onclick = function () {
        if (input.value.length !== 0) {
            ajaxSave(input.value);
        }
    }

    divCreation.appendChild(label);
    divCreation.appendChild(input);
    divCreation.appendChild(buttonSubmit);
}

/**
 * Make the value of the creation input to epmty and refresh the allergen's list.
 */
function refreshPage () {
    document.getElementById(idInputCreation).value = '';
    ajaxList();
}

/**
 * Switch the button of update allergen.
 *
 * @param idButtonUpdate
 */
function switchUpdate (idButtonUpdate) {
    let button = document.getElementById(idButtonUpdate);
    let numberId = idButtonUpdate.substr(getPrefixIdButtonUpdate().length);
    let input = document.getElementById(getPrefixIdInput() + numberId);

    if (button.innerText === 'Modifier') {
        button.innerText = 'Valider';
        input.readOnly = false;
    }
    else {
        button.innerText = 'Modifier';
        input.readOnly = true;
        ajaxUpdate(numberId, input.value);
    }
}
