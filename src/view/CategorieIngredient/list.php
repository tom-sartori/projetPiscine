<?php

echo <<< EOT
 <h1>Liste des catégories d'ingrédient</h1>
EOT;

$object = static::$object;
$primary = 'idCategorieIngredient';

$isConnected = Session::isConnected();
$isAdmin = Session::isAdmin();

$isUpdate = false;
$idToUpdate = '';
if ($_GET['action'] == 'readAll' && isset($_GET[$primary])) {
    $isUpdate = true;
    $idToUpdate = $_GET[$primary];
}

if ($isConnected) {
    echo <<< EOT
        <div id="divCreation{$object}"> 
            <form method="post" action="index.php?controller={$object}&action=created">
                <label for="nomCategorieIngredient" >Ajouter une catégorie : </label>
                <input type="text" name="nomCategorieIngredient">
                <input type="hidden" name="controller" value="{$object}"/>
                <input type="submit" value="Envoyer"/>
            </form>
        </div>
EOT;
}


echo <<< EOT
    <div id="divList{$object}"> 
        <ul>
EOT;

foreach ($tab_categorieIngredient as $categorieIngredient) {
    $raw_idCategorieIngredient = rawurlencode($categorieIngredient->get($primary));
    $spe_idCategorieIngredient = htmlspecialchars($categorieIngredient->get($primary));
    $spe_nomCategorieIngredient = htmlspecialchars($categorieIngredient->get('nomCategorieIngredient'));


    if ($isUpdate && ($idToUpdate == $categorieIngredient->get($primary))) {
        echo <<< EOT
            <li>
                <form method="post" action="index.php?controller={$object}&action=updated">

                    
                    <input hidden name="{$primary}" value="{$spe_idCategorieIngredient}">
                    <input type="hidden" name="controller" value="<?=static::$object?>"/>
                    <button class="buttonCheckSize">
                        <img class = "iconCheck" src="image/check.png" alt="Valider"/> </button>
                    </button>

              
                    <a class="parentButton" href="./index.php?controller={$object}&action=delete&{$primary}={$raw_idCategorieIngredient}">
                        <button class ="buttonSupSize">
                            <img class = "iconSup" src="image/sup.png" alt="Supprimer" />
                        </button>
                    </a>

                    <!-- pareil que allergene : pour aligner boutons-->

                    <label for="nom{$object}">Catégorie : </label>
                    <input type="text" name="nom{$object}" value="{$spe_nomCategorieIngredient}">
                </form>
            </li>
EOT;
    }
    else {
        echo '<li class="listeEspace">';

        if ($isConnected) {
            echo <<< EOT
                <a class="buttonAlign" href="./index.php?controller={$object}&action=readAll&{$primary}={$raw_idCategorieIngredient}">
                    <button class ="buttonModSize">
                        <img class = "iconMod" src="image/edit.png" alt="Modifier" />
                    </button>
                </a>
EOT;
        }
        if ($isAdmin) {
            echo <<< EOT
                <a class="decalLabel" href="./index.php?controller={$object}&action=delete&{$primary}={$raw_idCategorieIngredient}">
                    <button class ="buttonSupSize">
                        <img class = "iconSup" src="image/sup.png" alt="Supprimer" />
                    </button>
                </a>
EOT;
        }
        echo $spe_nomCategorieIngredient . '</li>';
    }
}

echo '  </ul>
    </div>'

?>
