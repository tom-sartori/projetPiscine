<?php
require_once (File::build_path(array('model', 'ModelAsso_recette_ingredient.php')));
//require_once(File::build_path(Array('lib', 'Security.php')));// chargement du modèle


class ControllerAsso_recette_ingredient {

    public static function updateIngredientRecette($idRecette, $arrayIdIngredient) {
        ModelAsso_recette_ingredient::delete($idRecette);

        foreach ($arrayIdIngredient as $idIngredient) {
            $data = array(
                'idRecette' => $idRecette,
                'idIngredient' => $idIngredient,
            );
            ModelAsso_recette_ingredient::save($data);
        }
    }

}


?>