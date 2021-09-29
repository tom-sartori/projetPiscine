<?php

require_once File::build_path(array('controller', 'ControllerAccueil.php'));
require_once File::build_path(array('controller', 'ControllerAllergene.php'));
require_once File::build_path(array('controller', 'ControllerIngredient.php'));
require_once File::build_path(array('controller', 'ControllerRecette.php'));

if (isset($_GET['controller'])) {
    $controller = $_GET['controller'];
    $controllerClass = "Controller" . ucfirst($controller);

    if (class_exists($controllerClass)) {
        if (isset($_GET['action'])) {
            if (in_array($_GET['action'], get_class_methods($controllerClass))) {
                $action = $_GET['action'];
                $controllerClass::$action();
            }
            else {
                ControllerBouleDeNoel::error();
            }
        }
        else {
            $controllerClass::readAll();
        }
    }
    else {
        ControllerBouleDeNoel::error();
    }
}
else {
    if(isset($_GET['action'])){
        if(in_array($_GET["action"], get_class_methods('ControllerBouleDeNoel'))){
            $action=$_GET["action"];
            ControllerBouleDeNoel::$action();
        }
        else{
            ControllerBouleDeNoel::error();
        }
    }
    else {
        ControllerBouleDeNoel::readAll();
    }
}

?>
