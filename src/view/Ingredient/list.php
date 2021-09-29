<?php

$object = static::$object;
$primary = 'idIngredient';

echo <<< EOT
    <div id="divList{$object}"> 
        <ul>
EOT;

foreach ($tab_ingredient as $ingredient) {
    $raw_idIngredient = rawurlencode($ingredient->get($primary));
    $spe_idIngredient = htmlspecialchars($ingredient->get($primary));
    $spe_nomIngredient = htmlspecialchars($ingredient->get('nomIngredient'));

    echo <<< EOT
        <li>
            <a href="./index.php?controller={$object}&action=read&{$primary}={$raw_idIngredient}">
               {$spe_nomIngredient}
            </a> 
            <a href="./index.php?controller={$object}&action=update&{$primary}={$raw_idIngredient}">
                <button type="button">Modifier</button>
            </a> 
            <a href="./index.php?controller={$object}&action=delete&{$primary}={$raw_idIngredient}">
                <button type="button">Supprimer</button>
            </a> 
        </li>

EOT;

}

echo '  </ul>
    </div>'

?>
