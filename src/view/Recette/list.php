<?php

$object = static::$object;
$primary = 'idRecette';

$isConnected = Session::isConnected();
$isAdmin = Session::isAdmin();

echo <<< EOT
    <script type="text/javascript" src="js/recetteScript.js" defer></script>
EOT;

echo <<< EOT
    <div id="divSearch{$object}">
        <label class="class12">Recherche </label>
        <input id="inputSearch{$object}" name="nom{$object}" type="text">
    </div>
EOT;

echo <<< EOT
    <div id="divPrintButton{$object}">
    <input id=inputPrintButton{$object} type="button" value="Imprimer" onClick="window.print()">
    </div>
EOT;

echo <<< EOT
    <div id="divOrder{$object}">
        <label class="class12" for="order{$object}">Trier </label>
        <select name="order{$object}" id="selectOrder{$object}">
            <option value="nom{$object}ASC">Ordre alphabétique</option>
            <option value="nom{$object}DESC">Ordre anti-alphabétique</option>
<!--            TODO Par catégorie-->
        </select>
    </div>
EOT;

echo <<< EOT
    <div id="divPrintButton{$object}">
        <input id=inputPrintButton{$object} type="button" value="Imprimer" onClick="window.print()">
    </div>
EOT;

echo <<< EOT
    <div id="divList{$object}"> 
        <ul id="ulList{$object}">
EOT;


foreach ($tab_recette as $recette) {
    $raw_idRecette = rawurlencode($recette->get($primary));
    $spe_idRecette = htmlspecialchars($recette->get($primary));
    $spe_nomRecette = htmlspecialchars($recette->get('nomRecette'));

    echo '<li class="listeEspace">';       

    if ($isConnected) {
        echo <<< EOT
            <a class="buttonAlign" href="./index.php?controller={$object}&action=update&{$primary}={$raw_idRecette}">
                <button class ="buttonModSize">
                    <img class = "iconMod" src="image/edit.png" alt="Modifier" />
                </button>
            </a> 
EOT;
    }

    if ($isAdmin) {
        echo <<< EOT
            <a class="decalLabel" href="./index.php?controller={$object}&action=delete&{$primary}={$raw_idRecette}">
                <button class="buttonSupSize">
                    <img class = "iconSup" src="image/sup.png" alt="Supprimer" />
                </button>
            </a>
EOT;
    }
  
    echo <<< EOT
            <a class="parentButton" href="./index.php?controller={$object}&action=read&{$primary}={$raw_idRecette}">
                {$spe_nomRecette}
            </a>
    </li>
EOT;
}

echo '  </ul>
    </div>'

?>
