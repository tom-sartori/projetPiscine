const divdenomation = document.getElementsByClassName('denomationIngredient')[0]; //div denomation de l'étape 1
const divinformationsetape = document.getElementsByClassName('informationsEtape')[0] // div information de l'étape 1 
const buttonAddSelect = document.getElementById('buttonAddSelect');
const buttonDeleteSelect = document.getElementById('buttonDeleteSelect');
const listEtapes = document.getElementById('listetapes');
const etape = document.getElementById('etape');
const divtotal = document.getElementById('totalRecette').firstElementChild.nextElementSibling;
const ajouterButton = document.getElementById('ajouterButton');
const selectUtilisateurs = document.getElementById('selectUtilisateurs');
const selectCategories = document.getElementById('selectCategorieRecette');
const afficherTotal = document.getElementById('afficherTotal');
var prixHTTotal = 0;


class Etape {
    constructor(element, ordre, jsonValues, newOne, sousRecette) {
        if ((type == 'create' || newOne) && !sousRecette) {
            this.element = element; // Element qui représente la div .etape 
            this.ordre = ordre; // Int ordre l'étape dans la fiche technique
            this.nbSelect = 0; // USELESS POUR L'INSTANT
            this.nom = element.firstElementChild.firstElementChild.nextElementSibling.value; //value de l'input nom de la recette
            this.sousRecette = element.firstElementChild.lastElementChild.checked ? 1 : 0; // checkbox 
            this.description = element.firstElementChild.firstElementChild.nextElementSibling.nextElementSibling.value; // value de la textarea description de la recette
            this.ingredientlist = []; // [[id,quantite]]
            this.newOne = newOne;
            this.updateData = function () {
                this.nom = this.element.firstElementChild.firstElementChild.nextElementSibling.value;
                this.sousRecette = this.element.firstElementChild.lastElementChild.checked;
                this.description = this.element.firstElementChild.firstElementChild.nextElementSibling.nextElementSibling.value;
            };

            this.submitAllIngredient = function () {
                let allSelects = document.querySelectorAll("#etape" + this.ordre + " .selectIngredient");
                let allInputsQuantite = document.querySelectorAll("#etape" + this.ordre + " .quantiteIngredientInput");
                for (let i = 0; i < allSelects.length; i++) {
                    if (allInputsQuantite[i].value != 0) {
                        this.ingredientlist.push([allSelects[i].value, allInputsQuantite[i].value]);
                    }
                }
            };
        } else { // type=="update" || type=="detail"
            this.element = element; // Element qui représente la div .etape 
            this.ordre = ordre; // Int ordre l'étape dans la fiche technique
            this.nbSelect = 0; // USELESS POUR L'INSTANT
            this.sousRecette = jsonValues.estSousRecette;
            this.description = jsonValues.description;
            this.ingredientlist = jsonValues.ingredientList;
            this.nom = jsonValues.nomEtape;
            this.id = jsonValues.idEtape;
            this.updateView = function () {
                this.element.firstElementChild.firstElementChild.nextElementSibling.value = this.nom;
                this.element.firstElementChild.lastElementChild.checked = this.sousRecette == "1" ? true : false;
                this.element.firstElementChild.firstElementChild.nextElementSibling.nextElementSibling.value = this.description;
                if (this.ingredientlist.length > 0) {
                    if (this.ordre == 0) {
                        select.value = this.ingredientlist[0][0];
                        getIngredientByID(select)
                        select.parentElement.parentElement.lastElementChild.firstElementChild.firstElementChild.value = this.ingredientlist[0][1];
                        calculerPrix(select.parentElement.parentElement.lastElementChild.firstElementChild.firstElementChild);
                        for (let i = 1; i < this.ingredientlist.length; i++) {
                            addNewIngredientFromData(this.element.lastElementChild, this.ingredientlist[i][0], this.ingredientlist[i][1]);
                            calculerTotal();
                        }
                    } else {
                        for (let i = 0; i < this.ingredientlist.length; i++) {
                            addNewIngredientFromData(this.element.lastElementChild, this.ingredientlist[i][0], this.ingredientlist[i][1]);
                            calculerTotal();
                        }
                    }
                } else {
                    deleteLastIngredient(this.element.lastElementChild, true);
                }

            };
            this.updateData = function () {
                this.nom = this.element.firstElementChild.firstElementChild.nextElementSibling.value;
                this.sousRecette = this.element.firstElementChild.lastElementChild.checked;
                this.description = this.element.firstElementChild.firstElementChild.nextElementSibling.nextElementSibling.value;
            };
            this.submitAllIngredient = function () {
                this.ingredientlist = [];
                let allSelects = document.querySelectorAll("#etape" + this.ordre + " .selectIngredient");
                let allInputsQuantite = document.querySelectorAll("#etape" + this.ordre + " .quantiteIngredientInput");
                for (let i = 0; i < allSelects.length; i++) {
                    if (allInputsQuantite[i].value != 0) {
                        this.ingredientlist.push([allSelects[i].value, allInputsQuantite[i].value]);
                    }
                }
            };

        }

    }
}


var nbSelect = 0;
var nbEtape = 0;
var tabSousRecette = [Etape];


function getAllCategorie(){
    AJAXQueryAll('categorieRecette', allCategoriesSelect);
}

function allCategoriesSelect(responseText) {
    const tabCategories = JSON.parse(responseText)
    tabCategories.forEach(element => {
        var opt = document.createElement('option');
        opt.value = element.idCategorieRecette;
        opt.innerHTML = element.nomCategorieRecette;
        selectCategories.appendChild(opt);
    });

}

function getAllIngredients(){
    AJAXQueryAll('ingredient',allIngredientSelect);
}



function allIngredientSelect(responseText){
    const tabIngredient=JSON.parse(responseText)
    tabIngredient.sort(sortByNameASCIngredient);
    tabIngredient.forEach(element => {
        var opt = document.createElement('option');
        opt.value = element.idIngredient;
        opt.innerHTML = element.nomIngredient;
        select.appendChild(opt);
    });
    select.firstElementChild.setAttribute('selected','')
    setTimeout(2);
    getIngredientByID(select);
}

function getAllUtilisateurs(){
    AJAXQueryAll('utilisateur',allUtilisateursSelect);
}

function allUtilisateursSelect(responseText){
    const tabUtilisateurs = JSON.parse(responseText)
    tabUtilisateurs.forEach(element => {
        var opt = document.createElement('option');
        opt.value = element.loginUtilisateur;
        opt.innerHTML = element.nomUtilisateur + " " + element.prenomUtilisateur;
        selectUtilisateurs.appendChild(opt);
    });

}

function addNewIngredient(divinformationsetape) {
    let newIngredient= select.parentNode.parentNode.cloneNode(true);
    nbSelect++;
    newIngredient.id = "ingredient" + nbSelect; 
    newIngredient.lastElementChild.firstElementChild.firstElementChild.id+=nbSelect;
    newIngredient.lastElementChild.firstElementChild.firstElementChild.value="";
    newIngredient.lastElementChild.lastElementChild.innerHTML="X";
    newIngredient.lastElementChild.firstElementChild.firstElementChild.addEventListener('keyup', (element) => {
        calculerPrix(element.target)
    });
    newIngredient.lastElementChild.firstElementChild.firstElementChild.addEventListener('change', (element) => {
        calculerPrix(element.target)
    });
    newIngredient.firstElementChild.firstElementChild.addEventListener('change', (element) => getIngredientByID(element.target));
    divinformationsetape.appendChild(newIngredient);
}

function addNewIngredientFromData(divinformationsetape,idIngredient,quantite) {
    let newIngredient = select.parentNode.parentNode.cloneNode(true);
    nbSelect++;
    newIngredient.id = "ingredient" + nbSelect;
    newIngredient.firstElementChild.firstElementChild.value=idIngredient;
    getIngredientByID(newIngredient.firstElementChild.firstElementChild);
    setTimeout(2);
    newIngredient.lastElementChild.firstElementChild.firstElementChild.id += nbSelect;
    newIngredient.lastElementChild.firstElementChild.firstElementChild.value = quantite;
    calculerPrix(newIngredient.lastElementChild.firstElementChild.firstElementChild);
    newIngredient.lastElementChild.firstElementChild.firstElementChild.addEventListener('keyup', (element) => {
        calculerPrix(element.target)
    });
    newIngredient.lastElementChild.firstElementChild.firstElementChild.addEventListener('change', (element) => {
        calculerPrix(element.target)
    });
    newIngredient.firstElementChild.firstElementChild.addEventListener('change', (element) => getIngredientByID(element.target));
    divinformationsetape.appendChild(newIngredient);
}


function deleteLastIngredient(divinformationsetape,overwrite) {// overwrite =true ==> ne pas vérifier le nombre d'enfant
    if(!overwrite){
        if (divinformationsetape.childElementCount > 3) {
            divinformationsetape.lastChild.remove(); 
            nbSelect--;
        } else {
            alert("Vous ne pouvez pas supprimer le seul ingrédient de l'étape");
        }
    } else {
        divinformationsetape.lastChild.remove();
    }
    
}




function getIngredientByID(element){
    let idIngredient = element.value
    AJAXQueryID("ingredient",idIngredient,addInformationsOfIngredient,element.parentNode.parentNode);
}

function addInformationsOfIngredient(element,responseText){ // Here element references to the div id = ingredient+NumeroIngredient
    let ingredient = JSON.parse(responseText);
    let quantite = element.lastElementChild.firstElementChild
    quantite.nextElementSibling.innerHTML = ingredient.nomUnite //Unité
    quantite.nextElementSibling.nextElementSibling.innerHTML = ingredient.prixHT //prixUnitaire
    calculerPrix(quantite.firstElementChild);
}

function calculerPrix(element){
    let value = parseFloat(element.value)
    let divvalorisation = element.parentElement;
    let prixQuantite = divvalorisation.nextElementSibling.nextElementSibling.innerHTML;
    if (!isNaN(value)) {
        divvalorisation.nextElementSibling.nextElementSibling.nextElementSibling.innerHTML = (prixQuantite * value).toFixed(2);
    } else {
        divvalorisation.nextElementSibling.nextElementSibling.nextElementSibling.innerHTML = "X"
    }
    calculerTotal();
}

// Gestion des Étapes 
function createNewEtape() { 
    var newEtape = etape.cloneNode(true);
    newEtape.style.display = 'flex';
    nbEtape++;
    newEtape.id = newEtape.id.slice(0, -1);
    newEtape.id += nbEtape; 
    let divinformationsetape1 = newEtape.lastElementChild;
    while(divinformationsetape1.childElementCount > 3){
        divinformationsetape1.lastChild.remove();
    }
    divinformationsetape1.lastElementChild.lastElementChild.firstElementChild.firstElementChild.value="";
    divinformationsetape1.lastElementChild.lastElementChild.firstElementChild.firstElementChild.addEventListener('change', (element) => {
        calculerPrix(element.target)
    });
    divinformationsetape1.lastElementChild.lastElementChild.firstElementChild.firstElementChild.addEventListener('keyup', (element) => {
        calculerPrix(element.target)
    });
    if(type!='detail'){
        divinformationsetape1.firstElementChild.addEventListener('click', (event) => addNewIngredient(event.target.parentElement));
        divinformationsetape1.firstElementChild.nextElementSibling.addEventListener('click', (event) => deleteLastIngredient(event.target.parentElement));
    }
    divinformationsetape1.lastElementChild.firstElementChild.firstElementChild.addEventListener('change', (event) => getIngredientByID(event.target));
        
    let divdescriptifetape1 = newEtape.firstElementChild;
    divdescriptifetape1.firstElementChild.nextElementSibling.value=""; // remise a 0 du nom
    divdescriptifetape1.firstElementChild.nextElementSibling.nextElementSibling.value=""; // remise a 0 du descriptif
    divdescriptifetape1.lastElementChild.checked=0; //remise a 0 du sousRecette?
    tabEtapes[nbEtape] = new Etape(newEtape,nbEtape,null,true,false);
    listEtapes.appendChild(newEtape);
}

function createNewEtapeFromData(etape1) {
    var newEtape = etape.cloneNode(true);
    newEtape.style.display='flex';
    nbEtape++;
    newEtape.id = newEtape.id.slice(0, -1);
    newEtape.id += nbEtape;
    let divinformationsetape1 = newEtape.lastElementChild;
    if(type=='detail') {
        while (divinformationsetape1.childElementCount > 0) {
            divinformationsetape1.lastChild.remove();
        }
    } else {
        while (divinformationsetape1.childElementCount > 2) {
            divinformationsetape1.lastChild.remove();
        }
    }
    if(type!='detail'){
        divinformationsetape1.firstElementChild.addEventListener('click', (event) => addNewIngredient(event.target.parentElement));
        divinformationsetape1.firstElementChild.nextElementSibling.addEventListener('click', (event) => deleteLastIngredient(event.target.parentElement));
    }
    let divdescriptifetape1 = newEtape.firstElementChild;
    divdescriptifetape1.firstElementChild.nextElementSibling.value = ""; // remise a 0 du nom
    divdescriptifetape1.firstElementChild.nextElementSibling.nextElementSibling.value = ""; // remise a 0 du descriptif
    divdescriptifetape1.lastElementChild.checked = 0; //remise a 0 du sousRecette?
    etape1.element = newEtape;
    listEtapes.appendChild(newEtape);
}

function deleteLastEtape() {
    if (listEtapes.childElementCount > 1) {
        listEtapes.lastChild.remove();
        tabEtapes.pop();
        nbEtape--;
    } else {
        alert("Vous ne pouvez pas supprimer la seule étape de la recette")
    }
}


function calculerTotal() {
    let tabDivPrixHT = document.getElementsByClassName('prixHTIngredient');
    let result = 0;
    for (let i = 0; i < tabDivPrixHT.length; i++) {
        if (isFloat(tabDivPrixHT[i].innerHTML)) {
            result += parseFloat(tabDivPrixHT[i].innerHTML)
        }
    }
    result = result.toFixed(2);
    prixHTTotal = result;
    result += " €"
    divtotal.innerHTML = result;
    let totalTTC = parseFloat(prixHTTotal * 1.1 * document.getElementById('coefficientRecette').value + parseFloat(document.getElementById('chargeSalariale').value)).toFixed(2);
    divtotal.nextElementSibling.nextElementSibling.nextElementSibling.innerHTML = totalTTC + " €";
    divtotal.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.innerHTML = (totalTTC/parseInt(document.getElementById('nbCouvert').value)).toFixed(2);

}






// Initialiser la page 

etape.id+=nbSelect;
// Création du premier select 
const select = document.createElement('select');
select.name = "newIngredient";
select.classList.add("selectIngredient");
getAllIngredients();
divdenomation.appendChild(select);
getAllUtilisateurs();
getAllCategorie();


// Création des champs : quantité et de l'affichage du prixHT pour la première étape 
divdenomation.nextElementSibling.firstElementChild.firstElementChild.id += nbSelect;
divdenomation.nextElementSibling.firstElementChild.firstElementChild.addEventListener('keyup', (element) => {
    calculerPrix(element.target);
});
divdenomation.nextElementSibling.firstElementChild.firstElementChild.addEventListener('change', (element) => {
    calculerPrix(element.target)
});
// Création des boutons d'ajout d'ingrédient pour la première étape
if(type!='detail'){
    buttonAddSelect.addEventListener('click',(element) => addNewIngredient(element.target.parentElement)); 
    buttonDeleteSelect.addEventListener('click', (element) => deleteLastIngredient(element.target.parentElement));
}
select.addEventListener('change',(element) => getIngredientByID(element.target));

afficherTotal.addEventListener('change',function(){
    divtotal.parentElement.toggleAttribute('hidden');
    document.getElementById('coefficientRecette').parentElement.toggleAttribute('hidden');
    document.getElementById('chargeSalariale').parentElement.toggleAttribute('hidden');
    
});

if(type != 'detail'){
    const buttonAddSousRecette = document.getElementById('buttonAddSousRecette');
    const selectSousRecette = document.getElementById('selectSousRecette');
    buttonAddSousRecette.addEventListener('click', () => {
        tabEtapes[0].updateData();
        if(tabEtapes[0].description==""){
            etape.style.display='none';
            nbEtape--;
        }
        addSousRecette();

    });
    getAllSousRecette();
    ajouterButton.addEventListener('click', () => {
        if(type=="update"){
            sendDataUpdate();
        }
        if(type=="create"){
            sendDataCreate();
        }
    }); 
    document.getElementById('coefficientRecette').addEventListener('change',calculerTotal);
    document.getElementById('chargeSalariale').addEventListener('change',calculerTotal);
    document.getElementById('nbCouvert').addEventListener('change', calculerTotal);
    
}


function afficherDetailRecette(responseText){
    console.log(responseText);
    let data = JSON.parse(responseText);
    console.log(data);
    createTabEtapes(data);
    updateSelectFromData(selectCategories,data.categories);
    updateSelectFromData(selectUtilisateurs,data.auteurs);

}

function createTabEtapes(jsonValues){
    console.log(jsonValues);
    if (jsonValues.tabEtape.length > 0) {
    tabEtapes[0] = new Etape(etape, 0, jsonValues.tabEtape[0],false,false);
    tabEtapes[0].updateView();
    for(let i=1;i<jsonValues.tabEtape.length;i++){
        tabEtapes[i] = new Etape(null, i, jsonValues.tabEtape[i],false,false);
        createNewEtapeFromData(tabEtapes[i]);
        tabEtapes[i].updateView();
    }
    } else {
        tabEtapes[0] = new Etape(etape, 0,null,true,false);
    }
}

function createData(){
    let recette = {};
    recette.nomRecette = document.getElementById('nomRecette').value;
    recette.nbCouvert = document.getElementById('nbCouvert').value;
    recette.descriptif = document.getElementById('descriptifRecette').value;
    recette.coefficient = document.getElementById('coefficientRecette').value;
    recette.chargeSalariale = document.getElementById('chargeSalariale').value;
    if (typeof idRecette != 'undefined') {
        recette.idRecette = idRecette
    }
    let tabEtapescopy = tabEtapes;
    tabEtapescopy.forEach((element) => {
        element.updateData();
        element.submitAllIngredient();
    });
    
    recette.tabEtapes = tabEtapescopy;
    recette.auteurs = []
    for(var option of selectUtilisateurs.options){
        if(!option.disabled && option.selected){
            recette.auteurs.push(option.value)
        }

    }

    recette.categories = [];
    for (var option of selectCategories.options) {
        if (!option.disabled && option.selected) {
            recette.categories.push(option.value)
        }

    }
    return recette;
}

function sendDataCreate(){
    let data = createData();
    AJAXQuerySaveRecette(data);
}

function sendDataUpdate(){
    let data = createData();
    console.log(data);
    AJAXQueryUpdateRecette(data)
}

function updateSelectFromData(select,data){
    for(var value of data){
        for (var option of select.options) {
            if(option.value==value[0]){
                option.selected=true;
            }
        }
    }
}

function getAllSousRecette(){
    AJAXQueryAllSousRecette(afficherSousRecette);
}

function afficherSousRecette(responseText){
    tab = JSON.parse(responseText)
    for(let i=0;i<tab.length;i++){
        tabSousRecette[i] = new Etape(null,null,tab[i],false,true);
    }
    tabSousRecette.forEach(element => {
        var opt = document.createElement('option');
        opt.value = element.id;
        opt.innerHTML = element.nom;
        selectSousRecette.appendChild(opt);
    });
}

function addSousRecette(){
    idSousRecette = selectSousRecette.value;
    if(idSousRecette!=''){
        tabSousRecette.forEach(element => {
            if(element.id==idSousRecette){
                createNewEtapeFromData(element)
                element.updateView();
                element.ordre=nbEtape;
                
            }
        });
    }
}

// Création du tableau des Étapes
if(type=='create'){
    var tabEtapes = [Etape];
    tabEtapes[0] = new Etape(etape,0,null,false,false);
}
else if (type=='update'){
    var tabEtapes = [Etape];
    AJAXQueryDetailRecette(idRecette, afficherDetailRecette);
    
} else if (type=='detail'){
    var tabEtapes = [Etape];
    select.disabled =true;
    document.getElementById('descriptifRecette').disabled=true;
    document.getElementById('coefficientRecette').disabled=true;
    document.getElementById('chargeSalariale').disabled=true;
    const buttonEtiquette = document.getElementById('buttonEtiquette');
    buttonEtiquette.addEventListener('click',() => {
        location.replace('index.php?controller=recette&action=etiquette&idRecette=' + idRecette + '&prix=' + prixHTTotal);
    });
    AJAXQueryDetailRecette(idRecette, afficherDetailRecette);
}
