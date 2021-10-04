<?php

// ReadMe : old file unused


if (isset($_POST['controller'])) {
    $controller = $_POST['controller'];
    $modelClass = "Model" . $controller;

    if (isset($_POST['request'])) {
        $request = $_POST['request'];
        require_once '../model/' . $modelClass . '.php';

        if ($request == 'list') {
            if (isset($_POST['order'])) {
                $tab = $modelClass::selectAllOrderer($_POST['order']);
            }
            $tab = $modelClass::selectAll();
            echo json_encode($tab);
        }
        else if ($request == 'delete') {
            if (isset($_POST['value'])) {
                $modelClass::delete($_POST['value']); // TODO if return 0, then error.
            }
        }
    }
}

?>