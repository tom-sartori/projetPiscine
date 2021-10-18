<?php
require_once (File::build_path(array('model', 'ModelCategorieRecette.php')));
//require_once(File::build_path(Array('lib', 'Security.php')));// chargement du modèle


class ControllerCategorieRecette {

    protected static $object = 'CategorieRecette';


    public static function readAll() {
        $tab_categorieRecette = ModelCategorieRecette::selectAll();

        $view = 'list';
        $pagetitle = 'Liste des catégories';

        require_once(File::build_path(array('view', 'view.php')));
    }

    public static function read() {
        $idCategorieRecette = $_GET['idCategorieRecette'];
        $categorieRecette = ModelCategorieRecette::select($idCategorieRecette);

        if($categorieRecette == null){
            $view='error';
            $pagetitle='Erreur catégorie recette';

            require_once(File::build_path(array('view', 'view.php')));
        }
        else {
            $view = 'detail';
            $pagetitle = 'Catégorie détaillée';

            require_once(File::build_path(array('view', 'view.php')));
        }
    }

    public static function delete() {
        if (Session::isAdmin()) {
            ModelCategorieRecette::delete($_GET['idCategorieRecette']);

            $tab_categorieRecette = ModelCategorieRecette::selectAll();

            $view = 'deleted';
            $pagetitle = 'Catégorie supprimée';

            require_once(File::build_path(array('view', 'view.php')));
        }
        else {
            self::error();
        }
    }

    public static function error(){
        $view = 'error';
        $pagetitle = 'Page d\'erreur ';

        require_once(File::build_path(array('view', 'view.php')));
    }

    public static function create(){
        if (Session::isConnected()) {
            $idCategorieRecette = '';
            $nomCategorieRecette = '';

            $view = 'update';
            $pagetitle = 'Formulaire d\'ajout de catégorie';

            require_once(File::build_path(array('view', 'view.php')));
        }
        else {
            self::error();
        }
    }

    public static function update(){
        if (Session::isConnected()) {
            $idCategorieRecette = htmlspecialchars("" . $_GET['idCategorieRecette']);
            $categorieRecette = ModelCategorieRecette::select($idCategorieRecette);

            $nomCategorieRecette = htmlspecialchars("{$categorieRecette->get('nomCategorieRecette')}");


            $view = 'update';
            $pagetitle = 'Formulaire de mise à jour';

            require_once(File::build_path(array('view', 'view.php')));
        }
        else {
            self::error();
        }
    }

    public static function created(){
        if (Session::isConnected()) {
            $data = array(
                'nomCategorieRecette' => $_POST['nomCategorieRecette']);
            $erreur = ModelCategorieRecette::save($data);

            if ($erreur == 0) {
                $view = 'error';
                $pagetitle = 'Erreur de création';
            } else {
                $tab_categorieRecette = ModelCategorieRecette::selectAll();

                $view = 'created';
                $pagetitle = 'Création validée';

                require_once(File::build_path(array('view', 'view.php')));
            }
        }
        else {
            self::error();
        }
    }

    public static function updated(){
        if (Session::isConnected()) {
            $data = array(
                'nomCategorieRecette' => $_POST['nomCategorieRecette']);

            $idCategorieRecette = $_POST['idCategorieRecette'];
            $erreur = ModelCategorieRecette::update($data, $idCategorieRecette);

            if ($erreur == 0) {
                $view = 'error';
                $pagetitle = 'Erreur mise à jour';
            } else {
                $tab_categorieRecette = ModelCategorieRecette::selectAll();

                $view = 'updated';
                $pagetitle = 'Mise à jour effectuée';

                require_once(File::build_path(array('view', 'view.php')));
            }
        }
        else {
            self::error();
        }
    }
}