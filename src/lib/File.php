<?php

/*
	Classe utilitaire pour faciliter la création de chemins d'accès à un fichier
*/

class File {
	public static function build_path($array_path) {
		$DS = DIRECTORY_SEPARATOR;
		$ROOT_FOLDER = __DIR__ . $DS . "..";

		return $ROOT_FOLDER . $DS . join($DS, $array_path);
	}
}

?>