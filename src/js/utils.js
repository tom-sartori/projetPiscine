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

function AJAXQueryAll(table_name,funcToExec) {  // fait un "select * from :table_name" et le renvoie vers la fonction funcToExec
    let request = new XMLHttpRequest();
    request.open('POST', urlModel);
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    request.addEventListener("load", () => {
        funcToExec(request.responseText)
    });
    request.send("request=selectAll&object=" + table_name);
    
}

function AJAXQueryID(table_name,id,funcToExec,element) { // fait un "select * from :table_name" where id=:id et le renvoie vers la fonction funcToExec
    let request = new XMLHttpRequest();
    request.open('POST', urlModel);
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    request.addEventListener("load", () => {
        funcToExec(element,request.responseText)
    });
    request.send("request=selectByID&object=" + table_name + "&primarykey=idIngredient&id=" + id);

}

function AJAXQuerySaveRecette(data){ // data = tabEtapes de recetteCreateScript.js
    let request = new XMLHttpRequest();
    request.open('POST', urlModel);
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    request.addEventListener("load", () => {
        if(request.responseText!=1){
            alert("Une erreur est survenue");
            location.replace("index.php?controller=Recette&action=create");
        }
    });
    request.send("request=saverecette&object="+JSON.stringify(data));
}

function AJAXQueryDetailRecette(id, funcToExec){
    let request = new XMLHttpRequest();
    request.open('POST', urlModel);
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    request.addEventListener("load", () => {
        funcToExec(request.responseText)
    });
    request.send("request=updaterecette&object=" + id);

}