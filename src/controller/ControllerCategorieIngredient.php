<?php
require_once (File::build_path(array('model', 'ModelCategorieIngredient.php')));
//require_once(File::build_path(Array('lib', 'Security.php')));// chargement du modèle


class ControllerCategorieIngredient {

    protected static $object = 'CategorieIngredient';


    public static function readAll() {
        $tab_categorieIngredient = ModelCategorieIngredient::selectAll();

        $view = 'list';
        $pagetitle = 'Liste des catégories';

        require_once(File::build_path(array('view', 'view.php')));
    }

    public static function read() {
        $idCategorieIngredient = $_GET['idCategorieIngredient'];
        $categorieIngredient = ModelCategorieIngredient::select($idCategorieIngredient);

        if($categorieIngredient == null){
            $view='error';
            $pagetitle='Erreur catégorie ingrédient';

            require_once(File::build_path(array('view', 'view.php')));
        }
        else {
            $view = 'detail';
            $pagetitle = 'Catégorie détaillée';

            require_once(File::build_path(array('view', 'view.php')));
        }
    }

    public static function delete() {
        ModelCategorieIngredient::delete($_GET['idCategorieIngredient']);

        $tab_categorieIngredient = ModelCategorieIngredient::selectAll();

        $view = 'deleted';
        $pagetitle = 'Catégorie supprimée';

        require_once(File::build_path(array('view', 'view.php')));
    }

    public static function error(){
        $view = 'error';
        $pagetitle = 'Page d\'erreur ';

        require_once(File::build_path(array('view', 'view.php')));
    }

    public static function create(){
        $idCategorieIngredient = '';
        $nomCategorieIngredient = '';

        $view = 'update';
        $pagetitle = 'Formulaire d\'ajout de catégorie';

        require_once(File::build_path(array('view', 'view.php')));
    }

    public static function update(){
        $idCategorieIngredient = htmlspecialchars("" . $_GET['idCategorieIngredient']);
        $categorieIngredient = ModelCategorieIngredient::select($idCategorieIngredient);

        $nomCategorieIngredient = htmlspecialchars("{$categorieIngredient->get('nomCategorieIngredient')}");


        $view = 'update';
        $pagetitle = 'Formulaire de mise à jour';

        require_once(File::build_path(array('view', 'view.php')));
    }

    public static function created(){
        $data = array(
            'nomCategorieIngredient' => $_POST['nomCategorieIngredient']);
        $erreur = ModelCategorieIngredient::save($data);

        if ($erreur == 0) {
            $view='error';
            $pagetitle='Erreur de création';
        }
        else{
            $tab_categorieIngredient = ModelCategorieIngredient::selectAll();

            $view='created';
            $pagetitle='Création validée';

            require_once(File::build_path(array('view', 'view.php')));
        }
    }

    public static function updated(){
        $data = array(
            'nomCategorieIngredient' => $_POST['nomCategorieIngredient']);

        $idCategorieIngredient = $_POST['idCategorieIngredient'];
        $erreur = ModelCategorieIngredient::update($data, $idCategorieIngredient);

        if($erreur==0) {
            $view='error';
            $pagetitle='Erreur mise à jour';
        }
        else{
            $tab_categorieIngredient = ModelCategorieIngredient::selectAll();

            $view = 'updated';
            $pagetitle = 'Mise à jour effectuée';

            require_once(File::build_path(array('view', 'view.php')));
        }
    }
}
