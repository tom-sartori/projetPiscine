<?php

echo <<< EOT
    <h1>Liste des chefs</h1>
EOT;

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
            <label for="nom{$object}" >Nom : </label>
            <input type="text" name="nom{$object}" value="{$spe_nomUtilisateur}" readonly>
            
            <label for="prenom{$object}" >Prénom : </label>
            <input type="text" name="prenom{$object}" value="{$spe_prenomUtilisateur}" readonly>
EOT;
    if ($isUser || Session::isAdmin()) {
        echo <<< EOT
            <a class="parentButton" href="./index.php?controller={$object}&action=update&{$primary}={$raw_loginUtilisateur}">
                <button class ="buttonModSize">
                    <img class = "iconMod" src="image/edit.png" alt="Modifier" />
                </button>
            </a>
EOT;
    }
  
    if (Session::isAdmin()) {
        echo <<< EOT
            <a class="parentButton" href="./index.php?controller={$object}&action=delete&{$primary}={$raw_loginUtilisateur}">
                <button class="buttonSupSize">
                    <img class = "iconSup" src="image/sup.png" alt="Supprimer" />
                </button>
            </a> 
    </li >
EOT;
    }

}

echo '  </ul>
    </div>'

?>
