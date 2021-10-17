<?php

$object = static::$object;

$spe_loginUtilisateur = htmlspecialchars($utilisateur -> get('loginUtilisateur'));
$spe_nomUtilisateur = htmlspecialchars($utilisateur -> get('nomUtilisateur'));
$spe_prenomUtilisateur = htmlspecialchars($utilisateur -> get('prenomUtilisateur'));

echo <<< EOT
    <h1>Profil de {$spe_prenomUtilisateur} {$spe_nomUtilisateur} </h1>
    <div>
        <label for="login{$object}" >Login : </label>
        <input type="text" name="login{$object}" value="{$spe_loginUtilisateur}" readonly>
        
        <label for="nom{$object}" >Nom : </label>
        <input type="text" name="nom{$object}" value="{$spe_nomUtilisateur}" readonly>
        
        <label for="prenom{$object}" >Prénom : </label>
        <input type="text" name="prenom{$object}" value="{$spe_prenomUtilisateur}" readonly>
    </div>  
EOT;

?>