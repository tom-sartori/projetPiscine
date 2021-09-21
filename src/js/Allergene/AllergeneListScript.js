const controller = 'Allergene';
const urlRouteurAllergene = 'routeur/routeurScriptAllergene.php';
const divCreation = document.getElementById('divCreateAllergene');
const divList = document.getElementById('divListAllergene');

const prefixIdButtonUpdate = 'buttonUpdate' + controller;
const prefixIdButtonDelete = 'buttonDelete' + controller;
const prefixIdInput = 'input' + controller;


window.onload = function () {
    showCreation();
    AJAXList();
}

function AJAXList() {
    let url = urlRouteurAllergene;
    let request = new XMLHttpRequest();
    request.open("POST", url, true);
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    request.addEventListener("load", function () {
        showList(request);
    });
    request.send("request=list");
}

function AJAXDelete (idAllergene) {
    let url = urlRouteurAllergene;
    let request = new XMLHttpRequest();
    request.open("POST", url, true);
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    request.addEventListener("load", function () {
        AJAXList();
    });
    request.send('request=delete&value=' + idAllergene);
}

function AJAXUpdate (idAllergene, nomAllergene) {
    let url = urlRouteurAllergene;
    let request = new XMLHttpRequest();
    request.open("POST", url, true);
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    request.addEventListener("load", function () {
        AJAXList();
    });
    request.send('request=update&valueId=' + idAllergene + '&valueNom=' + nomAllergene);
}

function AJAXSave (nomAllergene) {
    let url = urlRouteurAllergene;
    let request = new XMLHttpRequest();
    request.open("POST", url, true);
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    request.addEventListener("load", function () {
        showCreation();
        AJAXList();
    });
    request.send('request=save&valueNom=' + nomAllergene);
}


function showList(req) {
    viderElt(divList);

    console.log(req);
    let reqParsed = JSON.parse(req.responseText);
    // console.log(reqParsed);

    let ul = document.createElement('ul');
    divList.appendChild(ul);


    // TODO Check htmlencode pour input.

    for (let elt of reqParsed) {
        let id = elt.idAllergene;
        let nom = elt.nomAllergene;

        if (id != 0) {  // N'affiche pas l'element 0 car correspond à 'Aucun'.

            let li = document.createElement('li');
            li.id = 'li' + controller + id;

            li.appendChild(createInput(id, nom));
            li.appendChild(createButtonUpdate(id));
            li.appendChild(createButtonDelete(id));

            ul.appendChild(li);
        }
    }
}

function showCreation () {
    viderElt(divCreation);

    let input = document.createElement('input');
    input.type = 'text';
    input.id = 'inputCreationAllergene';

    let buttonSubmit = document.createElement('button');
    buttonSubmit.innerText = 'Valider';

    buttonSubmit.onclick = function () {
        if (input.value.length !== 0) {
            AJAXSave(input.value);
        }
    }

    input.onkeyup = function () {
        if (input.value.length !== 0 && event.key === 'Enter') {
            AJAXSave(input.value);
        }
    }

    divCreation.appendChild(input);
    divCreation.appendChild(buttonSubmit);
}

function viderElt (idElt) {
    idElt.innerHTML = "";
}

function createInput (id, text) {
    let input = document.createElement('input');
    input.id = prefixIdInput + id;
    input.type = 'text';
    input.value = text;
    input.readOnly = true;

    input.onkeyup = function (event) {
        if (event.key === 'Enter') {
            switchUpdate(prefixIdButtonUpdate + id);
        }
    };

    return input;
}

function createButtonUpdate (id) {
    let button = document.createElement('button');
    button.id = prefixIdButtonUpdate + id;
    button.innerText = 'Modifier';

    button.onclick = function () {
        switchUpdate(button.id);
    }

    return button;
}

function createButtonDelete (id) {
    let button = document.createElement('button');
    button.id = prefixIdButtonDelete + id;
    button.innerText = 'Supprimer';

    button.onclick = function () {
        AJAXDelete(id);
    }

    return button;
}

function switchUpdate (idButtonUpdate) {
    let button = document.getElementById(idButtonUpdate);
    let id = idButtonUpdate.substr(prefixIdButtonUpdate.length);
    let input = document.getElementById(prefixIdInput + id);

    if (button.innerText === 'Modifier') {
        button.innerText = 'Valider';
        input.readOnly = false;
    }
    else {
        button.innerText = 'Modifier';
        input.readOnly = true;
        AJAXUpdate(id, input.value);
    }
}
