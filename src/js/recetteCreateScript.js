const divdenomation = document.getElementsByClassName('denomationIngredient')[0]; //div denomation de l'étape 1
const divinformationsetape = document.getElementsByClassName('informationsEtape')[0] // div information de l'étape 1 
const buttonAddSelect = document.getElementById('buttonAddSelect');
const buttonDeleteSelect = document.getElementById('buttonDeleteSelect');
const listEtapes = document.getElementById('listetapes');
const etape = document.getElementById('etape');
const divtotal = document.getElementById('totalRecette').firstElementChild.nextElementSibling;
const ajouterButton = document.getElementById('ajouterButton');
const selectUtilisateurs = document.getElementById('selectUtilisateurs');

var nbSelect = 0;
var nbEtape = 0;



function getAllIngredients(){
    AJAXQueryAll('ingredient',allIngredientSelect);
}

function allIngredientSelect(responseText){
    const tabIngredient=JSON.parse(responseText)
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
        calculerTotal();
    });
    newIngredient.lastElementChild.firstElementChild.firstElementChild.addEventListener('change', (element) => {
        calculerPrix(element.target)
        calculerTotal();
    });
    newIngredient.firstElementChild.firstElementChild.addEventListener('change', (element) => getIngredientByID(element.target));
    divinformationsetape.appendChild(newIngredient);
}

function deleteLastIngredient(divinformationsetape) {
    if (divinformationsetape.childElementCount > 3) {
        divinformationsetape.lastChild.remove(); 
        nbSelect--;
    } else {
        alert("Vous ne pouvez pas supprimer le seul ingrédient de l'étape");
    }
}


function getIngredientByID(element){
    let idIngredient = element.value
    AJAXQueryID("ingredient",idIngredient,addInformationsOfIngredient,element.parentNode.parentNode)
}

function addInformationsOfIngredient(element,responseText){ // Here element references to the div id = ingredient+NumeroIngredient
    let ingredient = JSON.parse(responseText);
    let numeroIngredient = element.id.substr(10,1);
    let quantite = element.lastElementChild.firstElementChild
    quantite.nextElementSibling.innerHTML = ingredient.nomUnite //Unité
    quantite.nextElementSibling.nextElementSibling.innerHTML = ingredient.prixHT //prixUnitaire
    quantite.nextElementSibling.nextElementSibling.nextElementSibling.innerHTML = "X";
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
}

// Gestion des Étapes 
function createNewEtape() { 
    var newEtape = etape.cloneNode(true);
    nbEtape++
    newEtape.id = newEtape.id.slice(0, -1);
    newEtape.id += nbEtape; 
    let divinformationsetape1 = newEtape.lastElementChild;
    while(divinformationsetape1.childElementCount > 3){
        divinformationsetape1.lastChild.remove();
    }
    divinformationsetape1.lastElementChild.lastElementChild.firstElementChild.firstElementChild.value="";
    divinformationsetape1.lastElementChild.lastElementChild.firstElementChild.firstElementChild.addEventListener('change', (element) => {
        calculerPrix(element.target)
        calculerTotal();
    });
    divinformationsetape1.lastElementChild.lastElementChild.firstElementChild.firstElementChild.addEventListener('keyup', (element) => {
        calculerPrix(element.target)
        calculerTotal();
    });
    divinformationsetape1.firstElementChild.addEventListener('click', (event) => addNewIngredient(event.target.parentElement));
    divinformationsetape1.firstElementChild.nextElementSibling.addEventListener('click', (event) => deleteLastIngredient(event.target.parentElement));
    divinformationsetape1.lastElementChild.firstElementChild.firstElementChild.addEventListener('change', (event) => getIngredientByID(event.target));

    let divdescriptifetape1 = newEtape.firstElementChild;
    divdescriptifetape1.firstElementChild.nextElementSibling.value=""; // remise a 0 du nom
    divdescriptifetape1.firstElementChild.nextElementSibling.nextElementSibling.value=""; // remise a 0 du descriptif
    divdescriptifetape1.lastElementChild.checked=0; //remise a 0 du sousRecette?
    tabEtapes[nbEtape] = new Etape(newEtape,nbEtape);
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
    let tabPrix = [];
    let result = 0;
    for (let i = 0; i < tabDivPrixHT.length; i++) {
        if (tabDivPrixHT[i].innerHTML != "X") {
            result += parseFloat(tabDivPrixHT[i].innerHTML)
        }
    }
    result += " €"
    divtotal.innerHTML = result;

}


function Etape(element, ordre/*, jsonValues,bool=create or update */) { // "Classe" (pas vraiment) qui représente une étape
    this.element = element; // Element qui représente la div .etape 
    this.ordre = ordre; // Int ordre l'étape dans la fiche technique
    this.nbSelect = 0; // USELESS POUR L'INSTANT
    this.nom = element.firstElementChild.firstElementChild.nextElementSibling.value //value de l'input nom de la recette
    this.sousRecette = element.firstElementChild.lastElementChild.checked ? 1 : 0 // checkbox 
    this.description = element.firstElementChild.firstElementChild.nextElementSibling.nextElementSibling.value // value de la textarea description de la recette
    this.ingredientlist = []; // [[id,quantite]]

    this.updateData = function() {
        this.nom = element.firstElementChild.firstElementChild.nextElementSibling.value 
        this.sousRecette = element.firstElementChild.lastElementChild.checked 
        this.description = element.firstElementChild.firstElementChild.nextElementSibling.nextElementSibling.value
    }
    // if create 
    this.submitAllIngredient = function () {
        let allSelects = document.querySelectorAll("#etape" + this.ordre + " .selectIngredient");
        let allInputsQuantite = document.querySelectorAll("#etape" + this.ordre + " .quantiteIngredientInput");
        for (let i = 0; i < allSelects.length; i++) {
            if (allInputsQuantite[i].value != 0) {
                this.ingredientlist.push([allSelects[i].value, allInputsQuantite[i].value]);
            }
        }
    }

    // if update
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

// Création des champs : quantité et de l'affichage du prixHT pour la première étape 
divdenomation.nextElementSibling.firstElementChild.firstElementChild.id += nbSelect;
divdenomation.nextElementSibling.firstElementChild.firstElementChild.addEventListener('keyup', (element) => {
    calculerPrix(element.target);
    calculerTotal();
});
divdenomation.nextElementSibling.firstElementChild.firstElementChild.addEventListener('change', (element) => {
    calculerPrix(element.target)
    calculerTotal();
});
// Création des boutons d'ajout d'ingrédient pour la première étape
buttonAddSelect.addEventListener('click',(element) => addNewIngredient(element.target.parentElement)); 
buttonDeleteSelect.addEventListener('click', (element) => deleteLastIngredient(element.target.parentElement));
select.addEventListener('change',(element) => getIngredientByID(element.target));


ajouterButton.addEventListener('click', () => {
    if(type=="update"){
        AJAXQueryDetailRecette(idRecette,afficherDetailRecette);
    }
    if(type=="create"){
        sendData();
    }
    
});


function afficherDetailRecette(responseText){
    console.log(JSON.parse(responseText));
    // console.log(responseText);
}

function createData(){
    let recette = {};
    recette.nomRecette = document.getElementById('nomRecette').value;
    recette.nbCouvert = document.getElementById('nbCouvert').value;
    recette.descriptif = document.getElementById('descriptifRecette').value;
    recette.coefficient = document.getElementById('coefficientRecette').value;
    recette.chargeSalariale = document.getElementById('chargeSalariale').value;
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
    return recette;
}

function sendData(){
    let data = createData();
    AJAXQuerySaveRecette(data);
}
// Création du tableau des Étapes

var tabEtapes = [Etape];
tabEtapes[0] = new Etape(etape,0);

//if create 




//if update
