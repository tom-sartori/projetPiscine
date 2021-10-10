<?php

$object = static::$object;
$primary = 'idCategorieIngredient';

$isUpdate = false;
$idToUpdate = '';
if ($_GET['action'] == 'readAll' && isset($_GET[$primary])) {
    $isUpdate = true;
    $idToUpdate = $_GET[$primary];
}

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
                    <label for="nom{$object}">Catégorie : </label>
                    <input type="text" name="nom{$object}" value="{$spe_nomCategorieIngredient}">
                    
                    <input hidden name="{$primary}" value="{$spe_idCategorieIngredient}">
                    <input type="hidden" name="controller" value="<?=static::$object?>"/>
                    <button type="submit">Ajouter</button>
              
                    <a href="./index.php?controller={$object}&action=delete&{$primary}={$raw_idCategorieIngredient}">
                        <button type="button">Supprimer</button>
                    </a> 
                </form>
            </li>
EOT;
    }
    else {

        echo <<< EOT
            <li>
               {$spe_nomCategorieIngredient}
                <a href="./index.php?controller={$object}&action=readAll&{$primary}={$raw_idCategorieIngredient}">
                    <button type="button">Modifier</button>
                </a>
                <a href="./index.php?controller={$object}&action=delete&{$primary}={$raw_idCategorieIngredient}">
                    <button type="button">Supprimer</button>
                </a>
            </li>
EOT;

    }
}

echo '  </ul>
    </div>'

?>
