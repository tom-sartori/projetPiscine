<?php

/**
 * Router called by index.php to redirect to the good controller (and finally to the wanted view).
 * Check $_GET['controller'] and $_GET['action'].
 */

require_once File::build_path(array('controller', 'ControllerAllergene.php'));
require_once File::build_path(array('controller', 'ControllerIngredient.php'));
require_once File::build_path(array('controller', 'ControllerRecette.php'));
require_once File::build_path(array('controller', 'ControllerUtilisateur.php'));
require_once File::build_path(array('controller', 'ControllerCategorieRecette.php'));
require_once File::build_path(array('controller', 'ControllerCategorieIngredient.php'));


if (isset($_GET['controller'])) {
    $controller = $_GET['controller'];
    $controllerClass = "Controller" . ucfirst($controller);

    if (class_exists($controllerClass)) {
        if (isset($_GET['action'])) {
            $action = $_GET['action'];

            if (in_array($action, get_class_methods($controllerClass))) {
                // Normal case.
                $controllerClass::$action();
            }
            else {
                // Action doesn't exists in the controller.
                ControllerRecette::error();
            }
        }
        else {
            // Right controller without action.
            $controllerClass::readAll();
        }
    }
    else {
        // Controller name doesn't exists.
        ControllerRecette::error();
    }
}
else {
    // First case when arriving in index.php.
    ControllerRecette::readAll();
}

?>
