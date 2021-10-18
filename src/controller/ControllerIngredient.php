<?php
require_once (File::build_path(array('model', 'ModelIngredient.php')));
//require_once(File::build_path(Array('lib', 'Security.php')));// chargement du modèle


class ControllerIngredient {

    protected static $object = 'Ingredient';


    public static function readAll() {
        $tab_ingredient = ModelIngredient::selectAll();

        $view = 'list';
        $pagetitle = 'Liste des ingrédients';

        require_once(File::build_path(array('view', 'view.php')));
    }

    public static function read(){
        $idIngredient = $_GET['idIngredient'];
        $ingredient = ModelIngredient::select($idIngredient);

        if($ingredient == null){
            $view='error';
            $pagetitle='Erreur ingrédient';

            require_once(File::build_path(array('view', 'view.php')));
        }
        else {
            $view = 'detail';
            $pagetitle = 'Ingrédient détaillé';

            require_once(File::build_path(array('view', 'view.php')));
        }
    }

    public static function delete() {
        if (Session::isAdmin()) {
            ModelIngredient::delete($_GET['idIngredient']);

            $tab_ingredient = ModelIngredient::selectAll();

            $view = 'deleted';
            $pagetitle = 'Ingrédient supprimé';

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
            $idIngredient = '';
            $nomIngredient = '';
            $quantiteAchat = '';
            $idUniteQuantite = '';
            $prixHT = '';
            $idTaxe = '';
            $idCategorieIngredient = '';
            $idAllergene = '';

            $view = 'update';
            $pagetitle = 'Formulaire d\'ajout d\'ingrédient';

            require_once(File::build_path(array('view', 'view.php')));
        }
        else {
            self::error();
        }
    }

    public static function update(){
        if (Session::isConnected()) {
            $idIngredient = htmlspecialchars("" . $_GET['idIngredient']);
            $ingredient = ModelIngredient::select($idIngredient);

            $nomIngredient = htmlspecialchars("{$ingredient->get('nomIngredient')}");
            $quantiteAchat = htmlspecialchars("{$ingredient->get('quantiteAchat')}");
            $idUniteQuantite = htmlspecialchars("{$ingredient->get('idUniteQuantite')}");
            $prixHT = htmlspecialchars("{$ingredient->get('prixHT')}");
            $idTaxe = htmlspecialchars("{$ingredient->get('idTaxe')}");
            $idCategorieIngredient = htmlspecialchars("{$ingredient->get('idCategorieIngredient')}");
            $idAllergene = htmlspecialchars("{$ingredient->get('idAllergene')}");


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
                'nomIngredient' => $_POST['nomIngredient'],
                'quantiteAchat' => $_POST['quantiteAchat'],
                'idUniteQuantite' => $_POST['idUniteQuantite'],
                'prixHT' => $_POST['prixHT'],
                'idTaxe' => $_POST['idTaxe'],
                'idCategorieIngredient' => $_POST['idCategorieIngredient'],
                'idAllergene' => $_POST['idAllergene']);

            $erreur = ModelIngredient::save($data);

            if ($erreur == 0) {
                $view = 'error';
                $pagetitle = 'Erreur de création';
            } else {
                $tab_ingredient = ModelIngredient::selectAll();

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
                'nomIngredient' => $_POST['nomIngredient'],
                'quantiteAchat' => $_POST['quantiteAchat'],
                'idUniteQuantite' => $_POST['idUniteQuantite'],
                'prixHT' => $_POST['prixHT'],
                'idTaxe' => $_POST['idTaxe'],
                'idCategorieIngredient' => $_POST['idCategorieIngredient'],
                'idAllergene' => $_POST['idAllergene']);

            $idIngredient = $_POST['idIngredient'];
            $erreur = ModelIngredient::update($data, $idIngredient);

            if ($erreur == 0) {
                $view = 'error';
                $pagetitle = 'Erreur mise à jour';
            } else {
                $tab_ingredient = ModelIngredient::selectAll();

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