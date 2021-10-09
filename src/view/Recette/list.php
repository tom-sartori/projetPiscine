<?php

$object = static::$object;
$primary = 'idRecette';


echo <<< EOT
    <div id="divSearch{$object}">
        <label>Recherche </label>
        <input class="remplir" id="inputSearch{$object}" name="nom{$object}" type="text">
    </div>
EOT;

echo <<< EOT
    <div id="divOrder{$object}">
        <label for="order{$object}">Trier </label>
        <select name="order{$object}" id="selectOrder{$object}">
            <option value="nom{$object} ASC">Ordre alphabétique</option>
            <option value="nom{$object} DESC">Ordre anti-alphabétique</option>
<!--            TODO Par catégorie-->
        </select>
    </div>
EOT;

echo <<< EOT
    <div id="divList{$object}"> 
        <ul>
EOT;

echo <<< EOT
    <div id="divPrintButton{$object} "class="imprimer">
    <input id=inputPrintButton{$object} type="button" value="Imprimer" onClick="window.print()">
    </div>
EOT;

foreach ($tab_recette as $recette) {
    $raw_idRecette = rawurlencode($recette->get($primary));
    $spe_idRecette = htmlspecialchars($recette->get($primary));
    $spe_nomRecette = htmlspecialchars($recette->get('nomRecette'));

    echo <<< EOT
        <li>
            <a href="./index.php?controller={$object}&action=read&{$primary}={$raw_idRecette}">
               {$spe_nomRecette}
            </a> 
            <a href="./index.php?controller={$object}&action=update&{$primary}={$raw_idRecette}">
                <button type="button">Modifier</button>
            </a> 
            <a href="./index.php?controller={$object}&action=delete&{$primary}={$raw_idRecette}">
                <button type="button">Supprimer</button>
            </a> 
        </li>

EOT;

}

echo '  </ul>
    </div>'

?>
