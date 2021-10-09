const table = document.getElementById('tableIngredient');
const tableheader = table.childNodes[1].childNodes[0];
const select = document.getElementById('selectOrderIngredient');
const nameList = document.getElementsByClassName("dataline");
const tabIngredient = [];

const researchBar = document.getElementById('inputSearchIngredient')

select.addEventListener('change',sortTable);

function Ingredient(id, nom, prix, thelement){
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


function sortTable(){
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

function updateView(){
    table.childNodes[1].innerHTML=""
    table.childNodes[1].appendChild(tableheader);
    for(i=0;i<tabIngredient.length;i++){
        table.childNodes[1].appendChild(tabIngredient[i].thelement);
    }
}

researchBar.onkeyup = sortByResearch;

function sortByResearch() {
    for(i=0;i<tabIngredient.length;i++){
        if(!tabIngredient[i].name.toLowerCase().includes(researchBar.value)){
            tabIngredient[i].thelement.style.display='none';
        } else {
            tabIngredient[i].thelement.style.display = 'table-row';
        }
    }
    updateView();
}


function getAllUnite(){
    AJAXQueryAll('unitequantite',changeIdUniteQuantite)
}

function changeIdUniteQuantite(responseText){
    let tabUnite = JSON.parse(responseText);
    tabIngredient.forEach(element => {
        element.thelement.childNodes[7].innerHTML=tabUnite[element.thelement.childNodes[7].innerHTML-1].nomUnite
    })
}

sortTable();
getAllUnite();