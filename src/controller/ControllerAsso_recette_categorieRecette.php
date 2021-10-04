<?php
require_once (File::build_path(array('model', 'ModelAsso_recette_categorieRecette.php')));
//require_once(File::build_path(Array('lib', 'Security.php')));// chargement du modèle


class ControllerAsso_recette_categorieRecette {

    public static function updateCategorieRecette($idRecette, $arrayIdCategorieRecette) {
        ModelAsso_recette_categorieRecette::delete($idRecette);

        foreach ($arrayIdCategorieRecette as $idCategorieRecette) {
            $data = array(
                'idRecette' => $idRecette,
                'idCategorieRecette' => $idCategorieRecette,
            );
            ModelAsso_recette_categorieRecette::save($data);
        }
    }

}


?>