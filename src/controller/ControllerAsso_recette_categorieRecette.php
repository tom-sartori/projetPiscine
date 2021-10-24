<?php
require_once (File::build_path(array('model', 'ModelAsso_recette_categorieRecette.php')));

/**
 * Class ControllerAsso_recette_categorieRecette
 *
 * The controller is used between the model and the view. It receives the data from the model, make changes et send it to the right view.
 */
class ControllerAsso_recette_categorieRecette {

    /**
     * Get data in parameters and update the association table 'Asso_recette_categorieRecette' by the model.
     * @param $idRecette
     * @param $arrayIdCategorieRecette
     */
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