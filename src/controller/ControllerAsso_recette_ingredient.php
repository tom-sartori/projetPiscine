<?php
require_once (File::build_path(array('model', 'ModelAsso_recette_ingredient.php')));

/**
 * Class ControllerAsso_recette_ingredient
 *
 * The controller is used between the model and the view. It receives the data from the model, make changes et send it to the right view.
 */
class ControllerAsso_recette_ingredient {

    /**
     * Get data in parameters and update the association table 'Asso_recette_ingredient' by the model.
     *
     * @param $idRecette
     * @param $arrayIdIngredient
     */
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