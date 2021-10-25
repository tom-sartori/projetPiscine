const urlModel = 'model/ModelJs.php';

function sortByNameASC(a, b) {
    if (a.name.toLowerCase() < b.name.toLowerCase()) return -1;
    else if (a.name.toLowerCase() == b.name.toLowerCase()) return 0;
    else return 1;
}

function sortByNameASCIngredient(a, b) {
    if (a.nomIngredient.toLowerCase() < b.nomIngredient.toLowerCase()) return -1;
    else if (a.nomIngredient.toLowerCase() == b.nomIngredient.toLowerCase()) return 0;
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
        console.log(request.responseText);
        if(request.responseText!=1){
            alert("Veuillez remplir tous les champs de la recette");
            ;
            location.replace("index.php?controller=Recette&action=create");
        } else {
            alert("Nouvelle recette ajouté avec succès !");
            location.replace("index.php?controller=Recette");
        }
    });
    request.send("request=saverecette&object="+JSON.stringify(data));
}

function AJAXQueryUpdateRecette(data){
    let request = new XMLHttpRequest();
    request.open('POST', urlModel);
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    request.addEventListener("load", () => {
        console.log(request.responseText);
        if (request.responseText==1) {
            alert("Cette recette a été modifié avec succès !");
            // location.replace("index.php?controller=Recette");
        } else {
            alert("Une erreur est survenue");
        }
    });
    request.send("request=updaterecette&object=" + JSON.stringify(data));
}

function AJAXQueryDetailRecette(id, funcToExec){
    let request = new XMLHttpRequest();
    request.open('POST', urlModel);
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    request.addEventListener("load", () => {
        funcToExec(request.responseText)
    });
    request.send("request=detailrecette&object=" + id);

}

function AJAXQueryAllSousRecette(funcToExec){
    let request = new XMLHttpRequest();
    request.open('POST', urlModel);
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    request.addEventListener("load", () => {
        funcToExec(request.responseText)
    });
    request.send("request=sousrecette&object=");
}
function isFloat(n) {
    return !(Number(n) === n && n % 1 !== 0);
}