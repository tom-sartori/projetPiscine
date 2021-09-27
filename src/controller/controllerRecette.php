<?php

if ($action == 'list') {
    $pagetitle = 'Liste des recettes';
    $object = 'Recette';
    $view = 'list';
    require File::build_path(array("view", "view.php"));
}

?>