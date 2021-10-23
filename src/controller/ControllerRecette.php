<?php
require_once (File::build_path(array('model', 'ModelRecette.php')));
//require_once(File::build_path(Array('lib', 'Security.php')));// chargement du modèle


class ControllerRecette {

    protected static $object = 'Recette';


    public static function readAll() {
        $tab_recette = ModelRecette::selectAll();

        $view = 'list';
        $pagetitle = 'Liste des recettes';

        require_once(File::build_path(array('view', 'view.php')));
    }

    public static function read(){
        $idRecette = $_GET['idRecette'];
        $recette = ModelRecette::select($idRecette);

        if($recette == null){
            $view='error';
            $pagetitle='Erreur recette';

            require_once(File::build_path(array('view', 'view.php')));
        }
        else {
            $view = 'update';
            $pagetitle = 'Recette détaillée';
            $type='detail';

            require_once(File::build_path(array('view', 'view.php')));
        }
    }

    public static function delete() {
        ModelRecette::delete($_GET['idRecette']);

        $tab_recette = ModelRecette::selectAll();

        $view = 'deleted';
        $pagetitle = 'Recette supprimé';

        require_once(File::build_path(array('view', 'view.php')));
    }

    public static function error(){
        $view = 'error';
        $pagetitle = 'Page d\'erreur ';

        require_once(File::build_path(array('view', 'view.php')));
    }

    public static function create(){
        $idRecette = '';
        $nomRecette = '';
        $nbCouvert = '';
        $descriptif = 'Descriptif de la recette';
        $coefficient = '1';
        $chargeSalariale = '0';
        $view = 'update';
        $pagetitle = 'Formulaire d\'ajout de recette';
        $type = 'create';
        require_once(File::build_path(array('view', 'view.php')));
    }

    public static function update(){
        $idRecette = htmlspecialchars("" . $_GET['idRecette']);
        $recette = ModelRecette::select($idRecette);

        $nomRecette = htmlspecialchars("{$recette->get('nomRecette')}");
        $nbCouvert = htmlspecialchars("{$recette->get('nbCouvert')}");
        $descriptif = htmlspecialchars("{$recette->get('descriptif')}");
        $coefficient = htmlspecialchars("{$recette->get('coefficient')}");
        $chargeSalariale = htmlspecialchars("{$recette->get('chargeSalariale')}");

        $view = 'update';
        $pagetitle = 'Formulaire de mise à jour';
        $type = 'update';
        require_once(File::build_path(array('view', 'view.php')));
    }

    public static function created(){
        $data = array(
            'nomRecette' => $_POST['nomRecette'] ,
            'nbCouvert' => $_POST['nbCouvert'] ,
            'descriptif' => $_POST['descriptif'],
            'coefficient' => $_POST['coefficient'] ,
            'chargeSalariale' => $_POST['chargeSalariale']);

        $erreur = ModelRecette::save($data);

        if ($erreur == 0) {
            $view='error';
            $pagetitle='Erreur de création';
        }
        else {
            $idRecette = self::getLastId();
            self::updateAssoTable($idRecette);

            $tab_recette = ModelRecette::selectAll();

            $view='created';
            $pagetitle='Création validée';

            require_once(File::build_path(array('view', 'view.php')));
        }
    }

    public static function updated(){
        $data = array(
            'nomRecette' => $_POST['nomRecette'] ,
            'nbCouvert' => $_POST['nbCouvert'] ,
            'descriptif' => $_POST['descriptif'],
            'coefficient' => $_POST['coefficient'] ,
            'chargeSalariale' => $_POST['chargeSalariale']);

        $idRecette = $_POST['idRecette'];
        $erreur = ModelRecette::update($data, $idRecette);

        if($erreur==0) {
            $view='error';
            $pagetitle='Erreur mise à jour';
        }
        else {
            self::updateAssoTable($idRecette);

            $tab_recette = ModelRecette::selectAll();

            $view = 'updated';
            $pagetitle = 'Mise à jour effectuée';

            require_once(File::build_path(array('view', 'view.php')));
        }
    }

    private static function updateAssoTable ($idRecette) {
        if (isset($_POST['idCategorieRecette'])) {
            require_once File::build_path(array('controller', 'ControllerAsso_recette_categorieRecette.php'));
            ControllerAsso_recette_categorieRecette::updateCategorieRecette($idRecette, $_POST['idCategorieRecette']);
        }
        if (isset($_POST['idUtilisateur'])) {
            require_once File::build_path(array('controller', 'ControllerAsso_recette_utilisateur.php'));
            ControllerAsso_recette_utilisateur::updateUtilisateurRecette($idRecette, $_POST['idUtilisateur']);
        }
        if (isset($_POST['idIngredient'])) {
            require_once File::build_path(array('controller', 'ControllerAsso_recette_ingredient.php'));
            ControllerAsso_recette_ingredient::updateIngredientRecette($idRecette, $_POST['idIngredient']);
        }
    }
    private static function getLastId () {
        $idRecette = ModelRecette::getLastId();
        $idRecette = (int)$idRecette[0][0];
        return $idRecette;
    }

}