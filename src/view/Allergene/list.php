<?php

$object = static::$object;
$primary = 'idAllergene';

echo <<< EOT
    <div id="divCreation{$object}"> 
        <form method="post" action="index.php?controller={$object}&action=created">
            <label for="nomAllergene" >Ajouter un {$object} : </label>
            <input type="text" name="nomAllergene" id="nomAllergene">
            <input type="hidden" name="controller" value="{$object}"/>
            <input type="submit" value="Envoyer"/>
        </form>
    </div>
        
EOT;



echo <<< EOT
    <div id="divList{$object}"> 
        <ul>
EOT;

foreach ($tab_allergene as $allergene) {
    $raw_idAllergene = rawurlencode($allergene->get($primary));
    $spe_idAllergene = htmlspecialchars($allergene->get($primary));
    $spe_nomAllergene = htmlspecialchars($allergene->get('nomAllergene'));

    echo <<< EOT
        <li>
            <a href="./index.php?controller={$object}&action=read&{$primary}={$raw_idAllergene}">
               {$spe_nomAllergene}
            </a> 
            <a href="./index.php?controller={$object}&action=update&{$primary}={$raw_idAllergene}">
                <button type="button">Modifier</button>
            </a> 
            <a href="./index.php?controller={$object}&action=delete&{$primary}={$raw_idAllergene}">
                <button type="button">Supprimer</button>
            </a> 
        </li>

EOT;

}

echo '  </ul>
    </div>'

?>
