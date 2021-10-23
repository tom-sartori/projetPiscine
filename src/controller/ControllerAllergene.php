<?php
require_once (File::build_path(array('model', 'ModelAllergene.php')));


class ControllerAllergene {

    protected static $object = 'Allergene';


    public static function readAll() {
        $tab_allergene = ModelAllergene::selectAll();

        $view = 'list';
        $pagetitle = 'Liste des allergènes';

        require_once(File::build_path(array('view', 'view.php')));
    }

    public static function read(){
        $idAllergene = $_GET['idAllergene'];
        $allergene = ModelAllergene::select($idAllergene);

        if($allergene == null){
            $view='error';
            $pagetitle='Erreur allergène';

            require_once(File::build_path(array('view', 'view.php')));
        }
        else {
            $view = 'detail';
            $pagetitle = 'Allergène détaillé';

            require_once(File::build_path(array('view', 'view.php')));
        }
    }


    public static function delete() {
        if (Session::isAdmin()) {
            ModelAllergene::delete($_GET['idAllergene']);

            $tab_allergene = ModelAllergene::selectAll();

            $view = 'deleted';
            $pagetitle = 'Allergène supprimé';

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
            $idAllergene = '';
            $nomAllergene = '';

            $view = 'update';
            $pagetitle = 'Formulaire d\'ajout d\'allergène';

            require_once(File::build_path(array('view', 'view.php')));
        }
        else {
            self::error();
        }
    }

    public static function update(){
        if (Session::isConnected()) {
            $idAllergene = htmlspecialchars("" . $_GET['idAllergene']);
            $allergene = ModelAllergene::select($idAllergene);

            $nomAllergene = htmlspecialchars("{$allergene->get('nomAllergene')}");

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
                'nomAllergene' => $_POST['nomAllergene']);

            $erreur = ModelAllergene::save($data);

            if ($erreur == 0) {
                $view = 'error';
                $pagetitle = 'Erreur de création';
            } else {
                $tab_allergene = ModelAllergene::selectAll();

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
                'nomAllergene' => $_POST['nomAllergene']);

            $idAllergene = $_POST['idAllergene'];
            $erreur = ModelAllergene::update($data, $idAllergene);

            if ($erreur == 0) {
                $view = 'error';
                $pagetitle = 'Erreur mise à jour';
            } else {
                $tab_allergene = ModelAllergene::selectAll();

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