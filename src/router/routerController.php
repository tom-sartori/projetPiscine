<?php

if (isset($_GET['controller'])) {
    $controller = $_GET['controller'];
    $controllerClass = "Controller" . ucfirst($controller);

    if (isset($_GET['action'])) {
        $action = $_GET['action'];
        require_once File::build_path(array('controller', $controllerClass . '.php'));
    }
}
else {
    // TODO Page erreur / accueil
    require_once File::build_path(array('controller', 'ControllerAccueil.php'));
}


?>