const table = document.getElementById('tableIngredient');
const tableheader = table.childNodes[1].childNodes[0];
const select = document.getElementById('selectOrderIngredient');
const nameList = document.getElementsByClassName("dataline");
const tabIngredient = [];

const researchBar = document.getElementById('inputSearchIngredient')

select.addEventListener('change',sortTable);

function Ingredient(id, nom, prix, thelement){ // On construit un object Ingredient qui contient sa propre balise <td> associé
    this.id = id;
    this.name = nom;
    this.price = prix;
    this.thelement = thelement;
}

for (let i = 0; i < nameList.length; i++) {  //construction de tabIngredient : Ingredient[]
    tabIngredient.push(new Ingredient(
        nameList.item(i).childNodes[1].innerHTML,
        nameList.item(i).childNodes[3].innerHTML.split('<td name="nomIngredient"> ').pop(),
        nameList.item(i).childNodes[9].innerHTML,
        nameList.item(i)
    ));
}


function sortTable(){ // Permet de classer les ingrédients selon le type de tri choisi
    if (select.value == "nomIngredientASC"){
        tabIngredient.sort(sortByNameASC);
        updateView();
    }
    if (select.value == "nomIngredientDESC") {
        tabIngredient.sort(sortByNameDESC);
        updateView();
    }
    if (select.value == "prixHTASC") {
        tabIngredient.sort(sortByPriceASC);
        updateView();
    }
    if (select.value == "prixHTDESC") {
          tabIngredient.sort(sortByPriceDESC);
          updateView();
    }
}

function updateView(){ // Cela adapte la view au nouvel ordre de tabIngredient[]
    table.childNodes[1].innerHTML=""
    table.childNodes[1].appendChild(tableheader);
    for(i=0;i<tabIngredient.length;i++){
        table.childNodes[1].appendChild(tabIngredient[i].thelement);
    }
}

researchBar.onkeyup = sortByResearch;

function sortByResearch() { // A chaque entrée dans la researchBar on affiche uniquement ceux qui contiennent la String donné par l'utilisateur
    for(i=0;i<tabIngredient.length;i++){
        if(!tabIngredient[i].name.toLowerCase().includes(researchBar.value.toLowerCase())){
            tabIngredient[i].thelement.style.display='none';
        } else {
            tabIngredient[i].thelement.style.display = 'table-row';
        }
    }
    updateView();
}


function getAllUnite(){  // permet de changer les idUnitéQuantité avec les valeurs correspondantes (nomUnite)
    AJAXQueryAll('unitequantite',changeIdUniteQuantite)
}

function changeIdUniteQuantite(responseText){ // Met à jour la view en fonction des données de responseText
    let tabUnite = JSON.parse(responseText); 
    tabIngredient.forEach(element => {
        element.thelement.childNodes[7].innerHTML=tabUnite[element.thelement.childNodes[7].innerHTML-1].nomUnite
    })
}


function getAllTaxes(){
    AJAXQueryAll('taxe',changeIdTaxe)
}

function changeIdTaxe(responseText){
    let tabTaxe = JSON.parse(responseText);
    tabIngredient.forEach(element => {
        element.thelement.childNodes[11].innerHTML=tabTaxe[element.thelement.childNodes[11].innerHTML-1].montantTaxe + "%"
    });
}


function getAllCategories(){
    AJAXQueryAll('categorieIngredient',changeIdCategorie)
}

function changeIdCategorie(responseText){
    let tabCategorie = JSON.parse(responseText);
    tabIngredient.forEach(element => {
        element.thelement.childNodes[13].innerHTML = tabCategorie[element.thelement.childNodes[13].innerHTML - 1].nomCategorieIngredient;
    })
}

function getAllAllergenes(){
    AJAXQueryAll('allergene',changeIdAllergene)
}

function changeIdAllergene(responseText){
    let tabAllergene = JSON.parse(responseText);
    console.log(tabAllergene);
    tabIngredient.forEach(element => {
        element.thelement.childNodes[15].innerHTML = tabAllergene[element.thelement.childNodes[15].innerHTML].nomAllergene;
    })
}


sortTable();
getAllAllergenes();
getAllCategories();
getAllUnite(); 
getAllTaxes();
