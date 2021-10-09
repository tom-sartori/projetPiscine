const urlModel = 'model/ModelJs.php';

function sortByNameASC(a, b) {
    if (a.name.toLowerCase() < b.name.toLowerCase()) return -1;
    else if (a.name.toLowerCase() == b.name.toLowerCase()) return 0;
    else return 1;
}

function sortByNameDESC(a, b) {
    if (a.name.toLowerCase() < b.name.toLowerCase()) return 1;
    else if (a.name.toLowerCase() == b.name.toLowerCase()) return 0;
    else return -1;
}

function sortByPriceASC(a, b) {
    if (parseInt(a.price) < parseInt(b.price)) return -1;
    else if (parseInt(a.price) == parseInt(b.price)) return 0;
    else return 1;
}

function sortByPriceDESC(a, b) {
    if (parseInt(a.price) < parseInt(b.price)) return 1;
    else if (parseInt(a.price) == parseInt(b.price)) return 0;
    else return -1;
}

function AJAXQueryAll(table_name,funcToExec) {
    let request = new XMLHttpRequest();
    request.open('POST', urlModel);
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    request.addEventListener("load", () => {
        funcToExec(request.responseText)
    });
    request.send("request=selectAll&object=" + table_name);
    
}
