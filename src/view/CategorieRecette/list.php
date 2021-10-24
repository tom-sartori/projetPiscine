<?php

echo <<< EOT
     <h1>Liste des catégories de recette</h1>
EOT;

$object = static::$object;
$primary = 'idCategorieRecette';

$isConnected = Session::isConnected();
$isAdmin = Session::isAdmin();

$isUpdate = false;
$idToUpdate = '';
if ($_GET['action'] == 'readAll' && isset($_GET[$primary])) {
    $isUpdate = true;
    $idToUpdate = $_GET[$primary];
}

// Affichage formulaire création si l'utilisateur est connecté.
if ($isConnected) {
    echo <<< EOT
        <div id="divCreation{$object}"> 
            <form method="post" action="index.php?controller={$object}&action=created">
                <label for="nomCategorieRecette" >Ajouter une catégorie : </label>
                <input type="text" name="nomCategorieRecette">
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

foreach ($tab_categorieRecette as $categorieRecette) {
    $raw_idCategorieRecette = rawurlencode($categorieRecette->get($primary));
    $spe_idCategorieRecette = htmlspecialchars($categorieRecette->get($primary));
    $spe_nomCategorieRecette = htmlspecialchars($categorieRecette->get('nomCategorieRecette'));


    if ($isUpdate && ($idToUpdate == $categorieRecette->get($primary))) {
        echo <<< EOT
            <li>
                <form method="post" action="index.php?controller={$object}&action=updated">

                    
                    <input hidden name="{$primary}" value="{$spe_idCategorieRecette}">
                    <input type="hidden" name="controller" value="<?=static::$object?>"/>
                    <button class="buttonCheckSize">
                        <img class = "iconCheck" src="image/check.png" alt="Valider"/> </button>
                    </button>

              
                    <a class="parentButton" href="./index.php?controller={$object}&action=delete&{$primary}={$raw_idCategorieRecette}">
                        <button class ="buttonSupSize">
                            <img class = "iconSup" src="image/sup.png" alt="Supprimer" />
                        </button>
                    </a>

                    <!-- pour ordre et alignement-->
                    <label for="nom{$object}">Catégorie : </label>
                    <input type="text" name="nom{$object}" value="{$spe_nomCategorieRecette}">
                </form>
            </li>
EOT;
    }
    else {
        echo '<li class="listeEspace">';

        // Si utilisateur connecté, alors affichage du bouton de mofification.
        if ($isConnected) {
            echo <<< EOT
                <a class="buttonAlign" href="./index.php?controller={$object}&action=readAll&{$primary}={$raw_idCategorieRecette}">
                    <button class ="buttonModSize">
                        <img class = "iconMod" src="image/edit.png" alt="Modifier" />
                    </button>
                </a>
EOT;
        }

        // Si utilisateur admin, alors affichage du bouton de suppression.
        if ($isAdmin) {
            echo <<< EOT
                <a class="decalLabel" href="./index.php?controller={$object}&action=delete&{$primary}={$raw_idCategorieRecette}">
                    <button class="buttonSupSize">
                        <img class = "iconSup" src="image/sup.png" alt="Supprimer" />
                    </button>
                </a>
EOT;
        }

        echo $spe_nomCategorieRecette . '</li>';
    }
}

echo '  </ul>
    </div>'

?>
