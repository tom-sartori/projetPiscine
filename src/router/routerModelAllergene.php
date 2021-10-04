<?php

// ReadMe : old file unused


// TODO Supprimer cette page pour utiliser uniquement routerModel.php.

if (isset($_POST['request'])) {
    $request = $_POST['request'];
    require_once '../model/ModelAllergene.php';

    if ($request == 'update') {
        if (isset($_POST['valueId']) && isset($_POST['valueNom'])) {
            ModelAllergene::update($_POST['valueId'], $_POST['valueNom']); // TODO if return 0, then error.
        }
    }
    else if ($request == 'save') {
        if (isset($_POST['valueNom'])) {
            ModelAllergene::save($_POST['valueNom']); // TODO if return 0, then error.
        }
    }
}

?>