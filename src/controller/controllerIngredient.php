<?php

if ($action == 'list') {
    $pagetitle = 'Liste des ingrédients';
    $object = 'Ingredient';
    $view = 'list';
    require File::build_path(array("view", "view.php"));
}

?>