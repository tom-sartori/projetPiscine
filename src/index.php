<?php

/**
 * Main page which is called at each changes of page.
 * Call routeur.php.
 */

session_start();
require (__DIR__. DIRECTORY_SEPARATOR."lib". DIRECTORY_SEPARATOR."File.php");
require_once(File::build_path(array("lib","Session.php" )));
require (File::build_path(array("controller","router.php")));

?>