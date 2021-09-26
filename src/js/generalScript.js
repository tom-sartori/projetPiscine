/**
 * This file contents general functions.
 */


/**
 * Make an AJAX POST request.
 *
 * @param routerUrl correspond to the url of the router php page of the controller, that redirect to the model.
 * @param postContent
 * @param functionToExec correspond to the function to execute after the request is loaded.
 * @constructor
 */
function ajaxPost (routerUrl, postContent, functionToExec) {
    let url = routerUrl;
    let request = new XMLHttpRequest();
    request.open("POST", url, true);
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    request.addEventListener("load", function () {
        functionToExec(request);
    });
    request.send(postContent);
}

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