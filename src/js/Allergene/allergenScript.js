const controller = 'Allergene';
const urlRouteurAllergene = 'router/routerModelAllergene.php';
const divCreation = document.getElementById('divCreateAllergene');
const divList = document.getElementById('divListAllergene');

const prefixIdButtonUpdate = 'buttonUpdate' + controller;
const prefixIdButtonDelete = 'buttonDelete' + controller;
const prefixIdInput = 'input' + controller;
const idInputCreation = prefixIdInput + 'Creation';
const idButtonCreation = 'buttonCreate' + controller;



window.onload = function () {
    showCreation();
    ajaxList();
}

/**
 * Make an ajax post request to get the list of allergens.
 * When the response is gotten, call showList(...) to add elements to the DOM.
 *
 * N.B. : ajaxPost(...) is in generalScript.js.
 */
function ajaxList() {
    ajaxPost(urlRouteurAllergene,'request=list', showList);
}

/**
 * Make an ajax request to delete an allergen on the db.
 * Refresh the page with ajaxList after that.
 *
 * N.B. : ajaxPost(...) is in generalScript.js.
 * @param idAllergene
 */
function ajaxDelete (idAllergene) {
    ajaxPost(urlRouteurAllergene,'request=delete&value=' + idAllergene, ajaxList);
}

/**
 * Make an ajax request to update an allergen on the db.
 * Refresh the page with ajaxList after that.
 *
 * N.B. : ajaxPost(...) is in generalScript.js.
 * @param idAllergene
 * @param nomAllergene
 */
function ajaxUpdate (idAllergene, nomAllergene) {
    ajaxPost(urlRouteurAllergene,'request=update&valueId=' + idAllergene + '&valueNom=' + nomAllergene, ajaxList);
}

/**
 * Make an ajax request to create an allergen on the db.
 * Refresh the page with ajaxList after that.
 *
 * N.B. : ajaxPost(...) is in generalScript.js.
 * @param nomAllergene
 */
function ajaxSave (nomAllergene) {
    ajaxPost(urlRouteurAllergene,'request=save&valueNom=' + nomAllergene, refreshPage);
}


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

            li.appendChild(createInputAllergen(id, nom));
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
 * Return an input which contains the value of an allergen.
 *
 * If key 'Enter' is pressed, execute the function switchUpdate(...).
 * @param numberId correspond to idAllergene in the data base.
 * @param value correspond to nomAllergene in the data base.
 * @returns {HTMLInputElement}
 */
function createInputAllergen (numberId, value) {
    let input = createInput(prefixIdInput + numberId, value, 'text', true);

    input.onkeyup = function (event) {
        if (event.key === 'Enter') {
            switchUpdate(prefixIdButtonUpdate + numberId);
        }
    };

    return input;
}

/**
 * Return a button which is used to update an allergen.
 *
 * .onclick function is switchUpdate(...).
 * @param numberId correspond to idAllergene in the data base.
 * @returns {HTMLButtonElement}
 */
function createButtonUpdate (numberId) {
    let button = createButton(prefixIdButtonUpdate + numberId, 'Modifier', 'button');

    button.onclick = function () {
        switchUpdate(button.id);
    }

    return button;
}

/**
 * Return a button which is used to delete an allergen.
 *
 * .onclick function is ajaxDelete(...).
 * @param numberId correspond to idAllergene in the data base.
 * @returns {HTMLButtonElement}
 */
function createButtonDelete (numberId) {
    let button = createButton(prefixIdButtonDelete + numberId, 'Supprimer', 'button');

    button.onclick = function () {
        ajaxDelete(numberId);
    }

    return button;
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
    let numberId = idButtonUpdate.substr(prefixIdButtonUpdate.length);
    let input = document.getElementById(prefixIdInput + numberId);

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
