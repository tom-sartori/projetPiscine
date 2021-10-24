<?php
require_once (File::build_path(array('model', 'ModelUtilisateur.php')));
require_once(File::build_path(Array('lib', 'Security.php')));


/**
 * Class ControllerUtilisateur
 *
 * The controller is used between the model and the view. It receives the data from the model, make changes et send it to the right view.
 */
class ControllerUtilisateur {

    protected static $object = 'Utilisateur';


    /**
     * Get a complete list of objects from the model.
     * Call $object list view.
     */
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

    /**
     * Call the model to delete an $object where the primary value equal to the one in $_GET.
     * Delete only if the request comes from an admin.
     * Call $object deleted view.
     */
    public static function delete() {
        $loginUtilisateur = $_GET['loginUtilisateur'];

        // On vérifie que l'utilisateur qui supprime est bien celui supprimé.
        if (Session::isAdmin()) {
            ModelUtilisateur::delete($loginUtilisateur);

            if ($loginUtilisateur == $_SESSION['loginUtilisateur']) {
                self::deconnect();
            }

            $tab_utilisateur = ModelUtilisateur::selectAll();

            $view = 'deleted';
            $pagetitle = 'Utilisateur supprimé';

            require_once(File::build_path(array('view', 'view.php')));
        }
        else {
            self::error();
        }
    }

    /**
     * Call $object error view.
     */
    public static function error(){
        $view = 'error';
        $pagetitle = 'Page d\'erreur ';

        require_once(File::build_path(array('view', 'view.php')));
    }

    /**
     * Used to call the update view.
     * Only available if the user is connected.
     */
    public static function create(){
        if (Session::isConnected()) {
            $loginUtilisateur = '';
            $nomUtilisateur = '';
            $prenomUtilisateur = '';

            $view = 'update';
            $pagetitle = 'Formulaire d\'ajout';

            require_once(File::build_path(array('view', 'view.php')));
        }
        else {
            self::error();
        }
    }

    /**
     * Used to call the update view.
     * Pre-fil input in the view with the data got from the model.
     * Only available if the user is connected.
     */
    public static function update(){
        $loginUtilisateur = htmlspecialchars("" . $_GET['loginUtilisateur']);
        if (Session::isUser($loginUtilisateur) || Session::isAdmin()) {
            $utilisateur = ModelUtilisateur::select($loginUtilisateur);

            $nomUtilisateur = htmlspecialchars("{$utilisateur->get('nomUtilisateur')}");
            $prenomUtilisateur = htmlspecialchars("{$utilisateur->get('prenomUtilisateur')}");


            $tab_utilisateur = ModelUtilisateur::selectAll();

            $view = 'update';
            $pagetitle = 'Formulaire de mise à jour';

            require_once(File::build_path(array('view', 'view.php')));
        }
        else {
            self::connect();
        }
    }

    /**
     * Called from the update view with action create.
     * Get date in $_POST and send it to the model to create a new element.
     * Only available if the user is connected.
     */
    public static function created(){
        if (Session::isConnected()) {
            $data = array(
                'loginUtilisateur' => $_POST['loginUtilisateur'],
                'nomUtilisateur' => $_POST['nomUtilisateur'],
                'prenomUtilisateur' => $_POST['prenomUtilisateur'],
                'mdpUtilisateur' => Security::hasher($_POST['mdpUtilisateur'])
            );

            $erreur = ModelUtilisateur::save($data);

            if ($erreur == 0) {
                $view = 'error';
                $pagetitle = 'Erreur de création';
            } else {
                $tab_utilisateur = ModelUtilisateur::selectAll();

                $view = 'created';
                $pagetitle = 'Création validée';

                require_once(File::build_path(array('view', 'view.php')));
            }
        }
        else {
            self::error();
        }
    }

    /**
     * Called from the update view with action update.
     * Get date in $_POST and send it to the model to update an element.
     * Only available if the user is connected.
     */
    public static function updated(){
        $loginUtilisateur = $_POST['loginUtilisateur'];

        // On vérifie que l'utilisateur qui modifie conincide avec celui modifié.
        if (Session::isUser($loginUtilisateur) || Session::isAdmin()) {

            $data = array(
                'loginUtilisateur' => $_POST['loginUtilisateur'],
                'nomUtilisateur' => $_POST['nomUtilisateur'],
                'prenomUtilisateur' => $_POST['prenomUtilisateur'],
                'mdpUtilisateur' => Security::hasher($_POST['mdpUtilisateur'])
            );

            $erreur = ModelUtilisateur::update($data, $loginUtilisateur);

            if ($erreur == 0) {
                $view = 'error';
                $pagetitle = 'Erreur mise à jour';
            } else {
                $tab_utilisateur = ModelUtilisateur::selectAll();

                $view = 'updated';
                $pagetitle = 'Mise à jour effectuée';

                require_once(File::build_path(array('view', 'view.php')));
            }
        }
        else {
            self::error();
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
            $_SESSION['adminUtilisateur'] = ModelUtilisateur::getAdminUtilisateur($loginUtilisateur) == 1;

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