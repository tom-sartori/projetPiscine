<?php

echo <<< EOT
    <h1>Créer un compte Chef</h1>
EOT;

$object = static::$object;
$primary = 'loginUtilisateur';

$isUpdate = $_GET['action'] == 'update';
$action = ($isUpdate)?'updated':'created';
$valueSubmitButton = ($isUpdate)?'Modifier':'Ajouter';
$readOnlyOnUpdate = ($isUpdate)?'readonly':'';


echo <<< EOT
<div id="divCreation{$object}">
    <form class="form" method="post" action="index.php?controller={$object}&action={$action}">
    
        <label for="login{$object}" >Login : </label>
        <input type="text" name="login{$object}" value="$loginUtilisateur" required {$readOnlyOnUpdate}><br>
        
        <br><label for="nom{$object}" >Nom : </label>
        <input type="text" name="nom{$object}" value="{$nomUtilisateur}" required><br>

        <br><label for="prenom{$object}" >Prénom : </label>
        <input type="text" name="prenom{$object}" value="{$prenomUtilisateur}" required><br>

        <br><label for"mdp{$object}">Mot de passe : </label>
        <input type="password" name="mdp{$object}" required><br>

        <br><input type="hidden" name="controller" value="{$object}"/>
        <input type="submit" value="{$valueSubmitButton}"/>
    </form>
</div>

EOT;

?>