<?php
require_once (File::build_path(array('model', 'ModelAsso_recette_utilisateur.php')));


/**
 * Class ControllerAsso_recette_utilisateur
 *
 * The controller is used between the model and the view. It receives the data from the model, make changes et send it to the right view.
 */
class ControllerAsso_recette_utilisateur {

    /**
     * Get data in parameters and update the association table 'Asso_recette_categorieRecette' by the model.
     *
     * @param $idRecette
     * @param $arrayIdUtilisateur
     */
    public static function updateUtilisateurRecette($idRecette, $arrayIdUtilisateur) {
        ModelAsso_recette_utilisateur::delete($idRecette);

        foreach ($arrayIdUtilisateur as $idUtilisateur) {
            $data = array(
                'idRecette' => $idRecette,
                'idUtilisateur' => $idUtilisateur,
            );
            ModelAsso_recette_utilisateur::save($data);
        }
    }

}


?>