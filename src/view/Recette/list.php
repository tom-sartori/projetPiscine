<?php

$object = static::$object;
$primary = 'idRecette';

echo <<< EOT
    <div id="divList{$object}"> 
        <ul>
EOT;

foreach ($tab_recette as $recette) {
    $raw_idRecette = rawurlencode($recette->get($primary));
    $spe_idRecette = htmlspecialchars($recette->get($primary));
    $spe_nomRecette = htmlspecialchars($recette->get('nomRecette'));

    echo <<< EOT
        <li>
            <a href="./index.php?controller={$object}&action=read&{$primary}={$raw_idRecette}">
               {$spe_nomRecette}
            </a> 
            <a href="./index.php?controller={$object}&action=update&{$primary}={$raw_idRecette}">
                <button type="button">Modifier</button>
            </a> 
            <a href="./index.php?controller={$object}&action=delete&{$primary}={$raw_idRecette}">
                <button type="button">Supprimer</button>
            </a> 
        </li>

EOT;

}

echo '  </ul>
    </div>'

?>
