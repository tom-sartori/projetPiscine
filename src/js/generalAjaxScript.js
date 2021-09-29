/**
 * Make an AJAX POST request.
 *
 * @param urlRouterModel
 * @param postContent
 * @param functionToExec correspond to the function to execute after the request is loaded.
 * @constructor
 */
function ajaxPost (urlRouterModel, postContent, functionToExec) {
    let url = urlRouterModel;
    let request = new XMLHttpRequest();
    request.open("POST", url, true);
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    request.addEventListener("load", function () {
        functionToExec(request);
    });
    request.send(postContent);
}


/**
 * Make an ajax post request to get a list of elements of type $controller.
 * When the response is gotten, call showList(...) to add elements to the DOM.
 *
 */
function ajaxList() {
    ajaxPost(urlRouterModel, 'controller=' + controller + '&request=list', showList);
}

function ajaxListOrdered (order) {
    ajaxPost(urlRouterModel, 'controller=' + controller + '&request=list&order=' + order, showList);
}

/**
 * Make an ajax request to delete an element on the db.
 * Refresh the page with ajaxList after that.
 *
 * @param idElement
 */
function ajaxDelete (idElement) {
    ajaxPost(urlRouterModel,'controller=' + controller + '&request=delete&value=' + idElement, ajaxList);
}
