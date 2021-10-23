<?php

$object = static::$object;
$action = 'connected';

$errorMessage = isset($errorId)?$errorId:'';

echo <<< EOT
<div>
    <form method="post" action="index.php?controller={$object}&action={$action}">
        <fieldset>
            <label>{$errorMessage}</label>
            <label for="loginUtilisateur">Login</label>
            <input type="text" name="loginUtilisateur" required/>
                
            <label for="mdpUtilisateur"> Mot de passe </label>
            <input type="password" name="mdpUtilisateur" required/>

            <input type="submit" value="Envoyer" />
        </fieldset>
    </form>
</div>
EOT;

?>