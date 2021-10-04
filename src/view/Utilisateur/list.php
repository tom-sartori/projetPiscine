<?php

$object = static::$object;
$primary = 'idUtilisateur';


echo <<< EOT
    <div id="divCreation{$object}"> 
        <form method="post" action="index.php?controller={$object}&action=created">
            <label for="nom{$object}" >Nom : </label>
            <input type="text" name="nom{$object}" required>
            
            <label for="prenom{$object}" >Prénom : </label>
            <input type="text" name="prenom{$object}" required>
            
            <input type="hidden" name="controller" value="{$object}"/>
            <input type="submit" value="Ajouter"/>
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

    echo <<< EOT
        <li>
            <a href="./index.php?controller={$object}&action=read&{$primary}={$raw_idUtilisateur}">
               {$spe_prenomUtilisateur} {$spe_nomUtilisateur}
            </a> 
            <a href="./index.php?controller={$object}&action=update&{$primary}={$raw_idUtilisateur}">
                <button type="button">Modifier</button>
            </a> 
            <a href="./index.php?controller={$object}&action=delete&{$primary}={$raw_idUtilisateur}">
                <button type="button">Supprimer</button>
            </a> 
        </li>

EOT;

}

echo '  </ul>
    </div>'

?>
