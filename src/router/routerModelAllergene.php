<?php

if (isset($_POST['request'])) {
    $request = $_POST['request'];
    require_once '../model/ModelAllergene.php';

    if ($request == 'list') {
        $tab = ModelAllergene::getAllergene();
        echo json_encode($tab);
    }
    else if ($request == 'delete') {
        if (isset($_POST['value'])) {
            ModelAllergene::delete($_POST['value']); // TODO if return 0, then error.
        }
    }
    else if ($request == 'update') {
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