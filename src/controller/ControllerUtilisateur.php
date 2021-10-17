<?php
require_once (File::build_path(array('model', 'ModelUtilisateur.php')));
require_once(File::build_path(Array('lib', 'Security.php')));


class ControllerUtilisateur {

    protected static $object = 'Utilisateur';


    public static function readAll() {
        $tab_utilisateur = ModelUtilisateur::selectAll();

        $view = 'list';
        $pagetitle = 'Liste des utilisateurs';

        require_once(File::build_path(array('view', 'view.php')));
    }

    public static function read(){
        $loginUtilisateur = htmlspecialchars($_GET['loginUtilisateur']);
        $utilisateur = ModelUtilisateur::select($loginUtilisateur);

        if($utilisateur == null){
            $view='error';
            $pagetitle='Erreur utilisateur';

            require_once(File::build_path(array('view', 'view.php')));
        }
        else {
            $view = 'update';
            $pagetitle = 'Détail utilisateur';

            require_once(File::build_path(array('view', 'view.php')));
        }
    }

    public static function delete() {
        ModelUtilisateur::delete($_GET['loginUtilisateur']);

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
        $loginUtilisateur = '';
        $nomUtilisateur = '';
        $prenomUtilisateur = '';

        $view = 'update';
        $pagetitle = 'Formulaire d\'ajout';

        require_once(File::build_path(array('view', 'view.php')));
    }

    public static function update(){
        $loginUtilisateur = htmlspecialchars("" . $_GET['loginUtilisateur']);
        $utilisateur = ModelUtilisateur::select($loginUtilisateur);

        $nomUtilisateur = htmlspecialchars("{$utilisateur->get('nomUtilisateur')}");
        $prenomUtilisateur = htmlspecialchars("{$utilisateur->get('prenomUtilisateur')}");


        $tab_utilisateur = ModelUtilisateur::selectAll();

        $view = 'update';
        $pagetitle = 'Formulaire de mise à jour';

        require_once(File::build_path(array('view', 'view.php')));
    }

    public static function created(){
        $data = array(
            'loginUtilisateur' => $_POST['loginUtilisateur'],
            'nomUtilisateur' => $_POST['nomUtilisateur'],
            'prenomUtilisateur' => $_POST['prenomUtilisateur'],
            'mdpUtilisateur' => Security::hasher($_POST['mdpUtilisateur'])
        );

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
            'loginUtilisateur' => $_POST['loginUtilisateur'],
            'nomUtilisateur' => $_POST['nomUtilisateur'] ,
            'prenomUtilisateur' => $_POST['prenomUtilisateur'],
            'mdpUtilisateur' => Security::hasher($_POST['mdpUtilisateur'])
        );

        $loginUtilisateur = $_POST['loginUtilisateur'];
        $erreur = ModelUtilisateur::update($data, $loginUtilisateur);

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

    public static function connect() {
        $view = 'connect';
        $pagetitle = 'Page de connexion';

        require_once(File::build_path(array('view', 'view.php')));
    }

    public static function connected () {
        $loginUtilisateur = $_POST['loginUtilisateur'];
        $mdpUtilisateur = $_POST['mdpUtilisateur'];

        $userExists = ModelUtilisateur::checkPassword($loginUtilisateur, Security::hasher($mdpUtilisateur));

        if ($userExists) {
            $utilisateur = ModelUtilisateur::select($loginUtilisateur);
            $_SESSION['loginUtilisateur'] = $loginUtilisateur;

            $view = 'detail';
            $pagetitle = 'Profil';

            require_once(File::build_path(array('view', 'view.php')));
        }
        else {
            $errorId = 'Identifiant ou mot de passe incorrect. ';
            $view = 'connect';
            $pagetitle = 'Page de connexion';

            require_once(File::build_path(array('view', 'view.php')));
        }
    }

    public static function deconnect() {
        session_unset();
        session_destroy();
        setcookie(session_name(), '', time()-1);
        ControllerRecette::readAll();
    }
}