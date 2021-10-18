<?php

$object = static::$object;
$primary = 'idAllergene';

$isConnected = Session::isConnected();
$isAdmin = Session::isAdmin();

$isUpdate = false;
$idToUpdate = '';
if ($_GET['action'] == 'readAll' && isset($_GET[$primary])) {
    $isUpdate = true;
    $idToUpdate = $_GET[$primary];
}


if ($isConnected) {
    echo <<< EOT
        <div id="divCreation{$object}"> 
            <form method="post" action="index.php?controller={$object}&action=created">
                <label for="nomAllergene" >Ajouter un {$object} : </label>
                <input type="text" name="nomAllergene" id="nomAllergene">
                <input type="hidden" name="controller" value="{$object}"/>
                <button type="submit">Ajouter</button>
            </form>
        </div>
EOT;
}



echo <<< EOT
    <div id="divList{$object}"> 
        <ul>
EOT;

foreach ($tab_allergene as $allergene) {
    if ($allergene->get($primary) == 0) {continue;}

    $raw_idAllergene = rawurlencode($allergene->get($primary));
    $spe_idAllergene = htmlspecialchars($allergene->get($primary));
    $spe_nomAllergene = htmlspecialchars($allergene->get('nomAllergene'));

    if ($isUpdate && ($idToUpdate == $allergene->get($primary))) {
        echo <<< EOT
        <li>
            <form method="post" action="index.php?controller={$object}&action=updated">

                
                <input hidden name="{$primary}" value="{$spe_idAllergene}">
                <input type="hidden" name="controller" value="<?=static::$object?>"/>

                <button class="buttonCheckSize">
                    <img class = "iconCheck" src="image/check.png" alt="Valider"/> </button>
                </button> 

                <!-- pour aligner les boutons modif et sup  et les mettre avant texte: ordre modifié-->

                <label for="nom{$object}">Nom : </label>
                <input type="text" name="nom{$object}" value="{$spe_nomAllergene}">

            </form>
        </li>
EOT;
    }
    else {
        echo '<li class="listeEspace">';
      
        if ($isConnected) {
            echo <<< EOT
            <a class="buttonAlign" href="./index.php?controller={$object}&action=readAll&{$primary}={$raw_idAllergene}">
                <button class ="buttonModSize">
                    <img class = "iconMod" src="image/edit.png" alt="Modifier" />
                </button>
            </a>
EOT;
        }
        if ($isAdmin){
            echo <<< EOT
            <a class="decalLabel" href="./index.php?controller={$object}&action=delete&{$primary}={$raw_idAllergene}">
                <button class="buttonSupSize">
                    <img class = "iconSup" src="image/sup.png" alt="Supprimer" />
                </button>
            </a>
EOT;
        }
        echo $spe_nomAllergene . '</li>';
    }
}

echo '  </ul>
    </div>'

?>
