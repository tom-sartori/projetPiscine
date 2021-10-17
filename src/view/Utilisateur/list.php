<?php

$object = static::$object;
$primary = 'loginUtilisateur';


echo <<< EOT
    <div id="divList{$object}"> 
        <ul>
EOT;

foreach ($tab_utilisateur as $utilisateur) {
    $raw_loginUtilisateur = rawurlencode($utilisateur->get($primary));
    $spe_iUtilisateur = htmlspecialchars($utilisateur->get($primary));
    $spe_nomUtilisateur = htmlspecialchars($utilisateur->get('nomUtilisateur'));
    $spe_prenomUtilisateur = htmlspecialchars($utilisateur->get('prenomUtilisateur'));
    $isUser = Session::isUser($utilisateur->get($primary));


    echo <<< EOT
    <li>
        <label for="nom{$object}">Nom : </label>
        <input type="text" name="nom{$object}" value="{$spe_nomUtilisateur}" readonly>
        
        <label for="prenom{$object}" >Prénom : </label>
        <input type="text" name="prenom{$object}" value="{$spe_prenomUtilisateur}" readonly>
EOT;
    if ($isUser || Session::isAdmin()) {
        echo <<< EOT
        <a href = "./index.php?controller=Utilisateur&action=update&loginUtilisateur={$raw_loginUtilisateur}" >
            <button type = "button" > Modifier</button >
        </a >
EOT;
    }
    if (Session::isAdmin()) {
        echo <<< EOT
        <a href = "./index.php?controller={$object}&action=delete&{$primary}={$raw_loginUtilisateur}" >
            <button type = "button" > Supprimer</button >
        </a > 
    </li >
EOT;
    }

}

echo '  </ul>
    </div>'

?>
