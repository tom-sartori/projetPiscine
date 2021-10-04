<?php
require_once (File::build_path(array('model', 'ModelAsso_recette_utilisateur.php')));
//require_once(File::build_path(Array('lib', 'Security.php')));// chargement du modèle


class ControllerAsso_recette_utilisateur {

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