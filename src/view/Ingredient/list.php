<?php

$object = static::$object;
$primary = 'idIngredient';

$isConnected = Session::isConnected();
$isAdmin = Session::isAdmin();

echo <<< EOT
    <script type="text/javascript" src="js/ingredientScript.js" defer></script>
EOT;

echo <<< EOT
     <h1>Liste des ingrédients</h1>
EOT;

// Affichage barre de recherche.
echo <<< EOT
    <div id="divSearch{$object}">
        <label class="class12">Recherche </label>
        <input id="inputSearch{$object}" name="nom{$object}" type="text">
    </div>
EOT;

// Affichage selection de l'ordre.
echo <<< EOT
    <div id="divOrder{$object}">
        <label class="class12" for="order{$object}">Trier </label>
        <select name="order{$object}" id="selectOrder{$object}" value="nom{$object}ASC">
            <option value="nom{$object}ASC">Ordre alphabétique</option>
            <option value="nom{$object}DESC">Ordre anti-alphabétique</option>
            <option value="prixHTASC">Prix croissant</option>
            <option value="prixHTDESC">Prix décroissant</option>
<!--            TODO Par catégorie-->
        </select>
    </div>
EOT;


// Affichage de la liste des ingrédients.
echo <<< EOT
    <div id="divList{$object}"> 
EOT;

echo <<< EOT
    <table id="table{$object}"> 
        
        <tr>
            <th>Nom</th>
            <th>Quantité d'achat</th>
            <th>Unité quantité</th>
            <th>Prix HT</th>
            <th>Taxe</th>
            <th>Catégorie d'ingrédient</th>
            <th>Allergène</th>
        </tr>
EOT;

foreach ($tab_ingredient as $ingredient) {
    $raw_idIngredient = rawurlencode($ingredient->get($primary)); // for links
    $spe_idIngredient = htmlspecialchars($ingredient->get($primary)); // for the html code
    $spe_nomIngredient = htmlspecialchars($ingredient->get('nomIngredient'));
    $spe_quantiteAchat = htmlspecialchars($ingredient->get('quantiteAchat'));
    $spe_idUniteIngredient = htmlspecialchars($ingredient->get('idUniteQuantite'));
    $spe_unite = htmlspecialchars(ModelUniteQuantite::select($ingredient->get('idUniteQuantite'))->get('nomUnite'));
    $spe_prixHT = htmlspecialchars($ingredient->get('prixHT'));
    $spe_idTaxe = htmlspecialchars($ingredient->get('idTaxe'));
    $spe_idCategorieIngredient = htmlspecialchars($ingredient->get('idCategorieIngredient'));
    $spe_idAllergene = htmlspecialchars($ingredient->get('idAllergene'));



    echo <<< EOT
        <tr id="dataline$spe_idIngredient" class="dataline">
            <td hidden>{$spe_idIngredient}</td>
            <td name="nomIngredient">{$spe_nomIngredient}</td>
            <td>{$spe_quantiteAchat}</td>
            <td>{$spe_unite}</td>
            <td>{$spe_prixHT}</td>
            <td>{$spe_idTaxe}</td>
            <td>{$spe_idCategorieIngredient}</td>
            <td>{$spe_idAllergene}</td>
            <td> 
EOT;

    // Si utilisateur connecté, alors affichage du bouton de mofification.
    if ($isConnected) {
        echo <<< EOT
                <a class="parentButton" href="./index.php?controller={$object}&action=update&{$primary}={$raw_idIngredient}">
                    <button class ="buttonModSize">
                        <img src="image/edit.png" alt="Modifier" />
                    </button>
                </a>
EOT;
    }

    // Si utilisateur admin, alors affichage du bouton de suppression.
    if ($isAdmin) {
        echo <<< EOT
                <a class="parentButton" href="./index.php?controller={$object}&action=delete&{$primary}={$raw_idIngredient}">
                    <button class ="buttonSupSize">
                        <img src="image/sup.png" alt="Supprimer" />
                    </button>
                </a> 
EOT;
    }

    echo '
            </td>
        </tr>';
}

echo '</table>';

?>
