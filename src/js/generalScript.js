/**
 * This file contents general functions and variables.
 */


/**
 * Change the innerHTML of the element in parameter to an empty value.
 *
 * @param element
 */
function cleanElement (element) {
    element.innerHTML = '';
}

/**
 * Create and return a HTML button with the next attributes.
 *
 * @param id
 * @param innerText
 * @param type
 * @returns {HTMLButtonElement}
 */
function createButton (id, innerText, type) {
    let button = document.createElement('button');
    button.id = id;
    button.innerText = innerText;
    button.type = type;

    return button;
}

/**
 * Return a button which is used to update an element.
 *
 * .onclick function is switchUpdate(...).
 * @param numberId correspond to idAllergene in the data base.
 * @returns {HTMLButtonElement}
 */
function createButtonUpdate (numberId) {
    let button = createButton(getPrefixIdButtonUpdate() + numberId, 'Modifier', 'button');

    button.onclick = function () {
        switchUpdate(button.id);
    }

    return button;
}

/**
 * Return a button which is used to delete an element.
 *
 * .onclick function is ajaxDelete(...).
 * @param numberId correspond to idAllergene in the data base.
 * @returns {HTMLButtonElement}
 */
function createButtonDelete (numberId) {
    let button = createButton(getPrefixIdButtonDelete() + numberId, 'Supprimer', 'button');

    button.onclick = function () {
        ajaxDelete(numberId);
    }

    return button;
}


/**
 * Create and return a HTML input with the next attributes.
 *
 * @param id
 * @param value
 * @param type
 * @param readOnly
 * @returns {HTMLInputElement}
 */
function createInput (id, value, type, readOnly) {
    let input = document.createElement('input');
    input.id = id;
    input.value = value;
    input.type = type;
    input.readOnly = readOnly;

    return input;
}

/**
 * Return an input which contains the value of an element.
 *
 * If key 'Enter' is pressed, execute the function switchUpdate(...).
 * @param numberId correspond to idAllergene in the data base.
 * @param value correspond to nomAllergene in the data base.
 * @returns {HTMLInputElement}
 */
function createInputElement (numberId, value) {
    let input = createInput(getPrefixIdInput() + numberId, value, 'text', true);

    input.onkeyup = function (event) {
        if (event.key === 'Enter') {
            switchUpdate(getPrefixIdButtonUpdate() + numberId);
        }
    };

    return input;
}



function getPrefixIdButtonUpdate () {
    return 'buttonUpdate' + controller;
}

function getPrefixIdButtonDelete () {
    return 'buttonDelete' + controller;
}

function getPrefixIdInput () {
    return 'input' + controller;
}