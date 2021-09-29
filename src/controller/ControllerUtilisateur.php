<?php
require_once (File::build_path(array('model', 'ModelUtilisateur.php')));
//require_once(File::build_path(Array('lib', 'Security.php')));// chargement du modèle


class ControllerUtilisateur {

    protected static $object = 'Utilisateur';


    public static function readAll() {
        $tab_utilisateur = ModelUtilisateur::selectAll();

        $view = 'list';
        $pagetitle = 'Liste des utilisateurs';

        require_once(File::build_path(array('view', 'view.php')));
    }

    public static function read(){
        $idUtilisateur = $_GET['idUtilisateur'];
        $utilisateur = ModelUtilisateur::select($idUtilisateur);

        if($utilisateur == null){
            $view='error';
            $pagetitle='Erreur utilisateur';

            require_once(File::build_path(array('view', 'view.php')));
        }
        else {
            $view = 'detail';
            $pagetitle = 'Détail utilisateur';

            require_once(File::build_path(array('view', 'view.php')));
        }
    }

    public static function delete() {
        ModelUtilisateur::delete($_GET['idUtilisateur']);

        $tab_utilisateur = ModelUtilisateur::selectAll();

        $view = 'deleted';
        $pagetitle = 'Utilisateur supprimé';

        require_once(File::build_path(array('view', 'view.php')));
    }

    public static function error(){
        $view = 'error';
        $pagetitle = 'Page d\'erreur ';

        require_once(File::build_path(array('view', 'view.php')));
    }

    public static function create(){
        $idUtilisateur = '';
        $nomUtilisateur = '';
        $prenomUtilisateur = '';

        $view = 'update';
        $pagetitle = 'Formulaire d\'ajout';

        require_once(File::build_path(array('view', 'view.php')));
    }

    public static function update(){
        $idUtilisateur = htmlspecialchars("" . $_GET['idUtilisateur']);
        $utilisateur = ModelUtilisateur::select($idUtilisateur);

        $nomUtilisateur = htmlspecialchars("{$utilisateur->get('nomUtilisateur')}");
        $prenomUtilisateur = htmlspecialchars("{$utilisateur->get('prenomUtilisateur')}");


        $tab_utilisateur = ModelUtilisateur::selectAll();

        $view = 'update';
        $pagetitle = 'Formulaire de mise à jour';

        require_once(File::build_path(array('view', 'view.php')));
    }

    public static function created(){
        $data = array(
            'nomUtilisateur' => $_POST['nomUtilisateur'] ,
            'prenomUtilisateur' => $_POST['prenomUtilisateur']);

        $erreur = ModelUtilisateur::save($data);

        if ($erreur == 0) {
            $view='error';
            $pagetitle='Erreur de création';
        }
        else{
            $tab_utilisateur = ModelUtilisateur::selectAll();

            $view='created';
            $pagetitle='Création validée';

            require_once(File::build_path(array('view', 'view.php')));
        }
    }

    public static function updated(){
        $data = array(
            'nomUtilisateur' => $_POST['nomUtilisateur'] ,
            'prenomUtilisateur' => $_POST['prenomUtilisateur']);

        $idUtilisateur = $_POST['idUtilisateur'];
        $erreur = ModelUtilisateur::update($data, $idUtilisateur);

        if($erreur==0) {
            $view='error';
            $pagetitle='Erreur mise à jour';
        }
        else{
            $tab_utilisateur = ModelUtilisateur::selectAll();

            $view = 'updated';
            $pagetitle = 'Mise à jour effectuée';

            require_once(File::build_path(array('view', 'view.php')));
        }
    }
}