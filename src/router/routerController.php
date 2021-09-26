<?php

if (isset($_GET['controller'])) {
    $controller = $_GET['controller'];

    if ($controller == 'accueil') {
        require_once File::build_path(array('controller', 'controllerAccueil.php'));
    }
    else if (isset($_GET['action'])) {
        $action = $_GET['action'];
        require_once File::build_path(array('controller', 'controllerAllergene.php'));
    }
}
else {
    // TODO Page erreur / accueil
    require_once File::build_path(array('controller', 'controllerAccueil.php'));
}


?>