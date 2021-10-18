<?php

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
                $controllerClass::$action();
            }
            else {
                ControllerRecette::error();
            }
        }
        else {
            $controllerClass::readAll();
        }
    }
    else {
        ControllerRecette::error();
    }
}
else {
    ControllerRecette::readAll();
}

?>
