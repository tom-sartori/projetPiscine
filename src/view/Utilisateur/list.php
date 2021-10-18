<?php

$object = static::$object;
$primary = 'idUtilisateur';

$isUpdate = false;
$idToUpdate = '';
if ($_GET['action'] == 'readAll' && isset($primary)) {
    $isUpdate = true;
    $idToUpdate = $_GET[$primary];
}


echo <<< EOT
    <div id="divCreation{$object}"> 
        <form method="post" action="index.php?controller={$object}&action=created">
            <label for="nom{$object}" >Nom : </label>
            <input type="text" name="nom{$object}" required>
            
            <label for="prenom{$object}" >Prénom : </label>
            <input type="text" name="prenom{$object}" required>
            
            <input type="hidden" name="controller" value="{$object}"/>
            <button class="submit" type="submit" value="Ajouter">Ajouter</button>
        </form>
    </div>
        
EOT;


echo <<< EOT
    <div id="divList{$object}"> 
        <ul>
EOT;

foreach ($tab_utilisateur as $utilisateur) {
    $raw_idUtilisateur = rawurlencode($utilisateur->get($primary));
    $spe_iUtilisateur = htmlspecialchars($utilisateur->get($primary));
    $spe_nomUtilisateur = htmlspecialchars($utilisateur->get('nomUtilisateur'));
    $spe_prenomUtilisateur = htmlspecialchars($utilisateur->get('prenomUtilisateur'));

    if ($isUpdate && ($idToUpdate == $utilisateur->get($primary))) {
        echo <<< EOT
        <li>
            <form method="post" action="index.php?controller={$object}&action=updated">                 
                <label class="saut" for="nom{$object}" >Nom : </label>
                <input type="text" name="nom{$object}" value="{$spe_nomUtilisateur}">
                
                <label class="saut" for="prenom{$object}" >Prénom : </label>
                <input type="text" name="prenom{$object}" value="{$spe_prenomUtilisateur}">
                
                <input hidden name="{$primary}" value="{$spe_iUtilisateur}">
                <input type="hidden" name="controller" value="<?=static::$object?>"/>
                <button class="buttonCheckSize">
                    <img class = "iconCheck" src="image/check.png" alt="Valider"/> </button>
                </button>
                
                <a class="parentButton" href="./index.php?controller={$object}&action=delete&{$primary}={$raw_idUtilisateur}">
                    <button class="buttonSupSize">
                        <img class = "iconSup" src="image/sup.png" alt="Supprimer"/>
                    </button>
                </a> 
            </form>
        </li>
EOT;
    }
    else {

        echo <<< EOT
        <li>
            <label for="nom{$object}" >Nom : </label>
            <input type="text" name="nom{$object}" value="{$spe_nomUtilisateur}" readonly>
            
            <label for="prenom{$object}" >Prénom : </label>
            <input type="text" name="prenom{$object}" value="{$spe_prenomUtilisateur}" readonly>
            
            <a class="parentButton" href="./index.php?controller={$object}&action=readAll&{$primary}={$raw_idUtilisateur}">
                <button class ="buttonModSize">
                    <img class = "iconMod" src="image/edit.png" alt="Modifier" />
                </button>
            </a>
            
            <a class="parentButton" href="./index.php?controller={$object}&action=delete&{$primary}={$raw_idUtilisateur}">
                <button class="buttonSupSize">
                    <img class = "iconSup" src="image/sup.png" alt="Supprimer" />
                </button>
            </a> 
        </li>
EOT;
    }

}

echo '  </ul>
    </div>'

?>
