const table = document.getElementById('tableIngredient');
const tableheader = table.childNodes[1].childNodes[0];
const select = document.getElementById('selectOrderIngredient');
const nameList = document.getElementsByClassName("dataline");
const tabIngredient = [];


select.addEventListener('change',sortTable);

function Ingredient(id, nom, prix, thelement){
    this.id = id;
    this.name = nom;
    this.price = prix;
    this.thelement = thelement;
}

for (let i = 0; i < nameList.length; i++) {
    tabIngredient.push(new Ingredient(
        nameList.item(i).childNodes[1].innerHTML,
        nameList.item(i).childNodes[3].innerHTML.split('<td name="nomIngredient"> ').pop(),
        nameList.item(i).childNodes[9].innerHTML,
        nameList.item(i)
    ));
}

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

sortTable();