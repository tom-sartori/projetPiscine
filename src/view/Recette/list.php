<?php

$object = static::$object;
$primary = 'idRecette';


echo <<< EOT
    <div id="divSearch{$object}">
        <label class="class12">Recherche </label>
        <input id="inputSearch{$object}" name="nom{$object}" type="text">
    </div>
EOT;

echo <<< EOT
    <div id="divOrder{$object}">
        <label class="class12" for="order{$object}">Trier </label>
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
    <div id="divPrintButton{$object}">
    <input id=inputPrintButton{$object} type="button" value="Imprimer" onClick="window.print()">
    </div>
EOT;

foreach ($tab_recette as $recette) {
    $raw_idRecette = rawurlencode($recette->get($primary));
    $spe_idRecette = htmlspecialchars($recette->get($primary));
    $spe_nomRecette = htmlspecialchars($recette->get('nomRecette'));

    echo <<< EOT
        <li class="listeEspace">

            <a class="buttonAlign" href="./index.php?controller={$object}&action=update&{$primary}={$raw_idRecette}">
                <button class ="buttonModSize">
                    <img class = "iconMod" src="edit.png" alt="Modifier" />
                </button>
            </a> 
            <a class="decalLabel" href="./index.php?controller={$object}&action=delete&{$primary}={$raw_idRecette}">
                <button class="buttonSupSize">
                    <img class = "iconSup" src="sup.png" alt="Supprimer" />
                </button>
            </a>
            <a class="parentButton" href="./index.php?controller={$object}&action=read&{$primary}={$raw_idRecette}">
                           {$spe_nomRecette}
            </a>
        </li>

EOT;

}

echo '  </ul>
    </div>'

?>
