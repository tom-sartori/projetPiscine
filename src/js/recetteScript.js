const list = document.getElementById('ulListRecette');
const nameList = document.getElementsByClassName('nameRecette');
const select = document.getElementById('selectOrderRecette');
const tabRecette = [];
const researchBar = document.getElementById('inputSearchRecette');

select.addEventListener('change', sortList);

function Recette(nom, lielement){
    this.name=nom;
    this.lielement = lielement;
}

for(i=0;i<nameList.length;i++){
    tabRecette[i] = new Recette(nameList[i].textContent.toLowerCase(), nameList[i].parentNode);
}

function sortList() {
    if (select.value == "nomRecetteASC") {
        tabRecette.sort(sortByNameASC);
        updateView();
    }
    if (select.value == "nomRecetteDESC") {
        tabRecette.sort(sortByNameDESC);
        updateView();
    }

}

function updateView(){
    list.innerHTML="";
    tabRecette.forEach(element => {
        list.appendChild(element.lielement);
    });
    
}

researchBar.onkeyup = sortByResearch;

function sortByResearch() {
    for (i = 0; i < tabRecette.length; i++) {
        if (!tabRecette[i].name.toLowerCase().includes(researchBar.value)) {
            tabRecette[i].lielement.style.display = 'none';
        } else {
            tabRecette[i].lielement.style.display = '';
        }
    }
    updateView();
}

sortList();

