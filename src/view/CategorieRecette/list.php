<?php

$object = static::$object;
$primary = 'idCategorieRecette';
$isUpdate = false;
$idToUpdate = '';
if ($_GET['action'] == 'readAll' && isset($primary)) {
    $isUpdate = true;
    $idToUpdate = $_GET[$primary];
}

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
                    <label for="nom{$object}">Catégorie : </label>
                    <input type="text" name="nom{$object}" value="{$spe_nomCategorieRecette}">
                    
                    <input hidden name="{$primary}" value="{$spe_idCategorieRecette}">
                    <input type="hidden" name="controller" value="<?=static::$object?>"/>
                    <input type="submit" value="Valider"/>
              
                    <a href="./index.php?controller={$object}&action=delete&{$primary}={$raw_idCategorieRecette}">
                        <button type="button">Supprimer</button>
                    </a> 
                </form>
            </li>
EOT;
    }
    else {

        echo <<< EOT
            <li>
               {$spe_nomCategorieRecette}
                <a href="./index.php?controller={$object}&action=readAll&{$primary}={$raw_idCategorieRecette}">
                    <button type="button">Modifier</button>
                </a>
                <a href="./index.php?controller={$object}&action=delete&{$primary}={$raw_idCategorieRecette}">
                    <button type="button">Supprimer</button>
                </a>
            </li>
EOT;

    }
}

echo '  </ul>
    </div>'

?>