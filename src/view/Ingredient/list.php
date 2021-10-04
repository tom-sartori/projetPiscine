<?php

$object = static::$object;
$primary = 'idIngredient';


echo <<< EOT
    <div id="divSearch{$object}">
        <label>Recherche </label>
        <input id="inputSearch{$object}" name="nom{$object}" type="text">
    </div>
EOT;

echo <<< EOT
    <div id="divOrder{$object}">
        <label for="order{$object}">Trier </label>
        <select name="order{$object}" id="selectOrder{$object}">
            <option value="nom{$object} ASC">Ordre alphabétique</option>
            <option value="nom{$object} DESC">Ordre anti-alphabétique</option>
            <option value="prixHT ASC">Prix croissant</option>
            <option value="prixHT DESC">Prix décroissant</option>
<!--            TODO Par catégorie-->
        </select>
    </div>
EOT;


echo <<< EOT
    <div id="divList{$object}"> 
        <ul>
EOT;

foreach ($tab_ingredient as $ingredient) {
    $raw_idIngredient = rawurlencode($ingredient->get($primary));
    $spe_idIngredient = htmlspecialchars($ingredient->get($primary));
    $spe_nomIngredient = htmlspecialchars($ingredient->get('nomIngredient'));

    echo <<< EOT
        <li>
            <a href="./index.php?controller={$object}&action=read&{$primary}={$raw_idIngredient}">
               {$spe_nomIngredient}
            </a> 
            <a href="./index.php?controller={$object}&action=update&{$primary}={$raw_idIngredient}">
                <button type="button">Modifier</button>
            </a> 
            <a href="./index.php?controller={$object}&action=delete&{$primary}={$raw_idIngredient}">
                <button type="button">Supprimer</button>
            </a> 
        </li>

EOT;

}

echo '  </ul>
    </div>'

?>
