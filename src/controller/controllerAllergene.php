<?php

if ($action == 'list') {
    $pagetitle = 'Liste des allergènes';
    $object = 'Allergene';
    $view = 'list';
    require File::build_path(array("view", "view.php"));
}

?>