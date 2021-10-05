<?php

$object = static::$object;
$primary = 'idIngredient';

echo <<< EOT
    <script type="text/javascript" src="js/ingredientScript.js" defer></script>
EOT;


echo <<< EOT
    <div id="divSearch{$object}">
        <label>Recherche </label>
        <input id="inputSearch{$object}" name="nom{$object}" type="text">
    </div>
EOT;

echo <<< EOT
    <div id="divOrder{$object}">
        <label for="order{$object}">Trier </label>
        <select name="order{$object}" id="selectOrder{$object}" value="nom{$object}ASC">
            <option value="nom{$object}ASC">Ordre alphabétique</option>
            <option value="nom{$object}DESC">Ordre anti-alphabétique</option>
            <option value="prixHTASC">Prix croissant</option>
            <option value="prixHTDESC">Prix décroissant</option>
<!--            TODO Par catégorie-->
        </select>
    </div>
EOT;


echo <<< EOT
    <div id="divList{$object}"> 
EOT;

echo <<< EOT
    <table id="table{$object}"> 
        
        <tr>
            <th>idIngredient</th>
            <th>nomIngredient</th>
            <th>quantiteAchat</th>
            <th>idUniteQuantite</th>
            <th>prixHT</th>
            <th>idTaxe</th>
            <th>idCategorieIngredient</th>
            <th>idAllergene</th>
        </tr>
EOT;

foreach ($tab_ingredient as $ingredient) {
    $raw_idIngredient = rawurlencode($ingredient->get($primary)); // for links
    $spe_idIngredient = htmlspecialchars($ingredient->get($primary)); // for the html code
    $spe_nomIngredient = htmlspecialchars($ingredient->get('nomIngredient'));
    $spe_quantiteAchat = htmlspecialchars($ingredient->get('quantiteAchat'));
    $spe_idUniteIngredient = htmlspecialchars($ingredient->get('idUniteQuantite'));
    $spe_prixHT = htmlspecialchars($ingredient->get('prixHT'));
    $spe_idTaxe = htmlspecialchars($ingredient->get('idTaxe'));
    $spe_idCategorieIngredient = htmlspecialchars($ingredient->get('idCategorieIngredient'));
    $spe_idAllergene = htmlspecialchars($ingredient->get('idAllergene'));



    echo <<< EOT
        <tr id="dataline$spe_idIngredient" class="dataline">
            <td>{$spe_idIngredient}</td>
            <td name="nomIngredient">{$spe_nomIngredient}</td>
            <td>{$spe_quantiteAchat}</td>
            <td>{$spe_idUniteIngredient}</td>
            <td>{$spe_prixHT}</td>
            <td>{$spe_idTaxe}</td>
            <td>{$spe_idCategorieIngredient}</td>
            <td>{$spe_idAllergene}</td>
            <td> 
                <a href="./index.php?controller={$object}&action=update&{$primary}={$raw_idIngredient}">
                    <button type="button">Modifier</button>
                </a> 
                <a href="./index.php?controller={$object}&action=delete&{$primary}={$raw_idIngredient}">
                    <button type="button">Supprimer</button>
                </a> 
            </td>
        </tr>   

EOT;

}



echo '  </ul>
    </div>';


echo <<< EOT
    </table> 
EOT;
?>