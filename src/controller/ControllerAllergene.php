<?php
require_once (File::build_path(array('model', 'ModelAllergene.php')));

/**
 * Class ControllerAllergene
 *
 * The controller is used between the model and the view. It receives the data from the model, make changes et send it to the right view.
 *
 */
class ControllerAllergene {

    protected static $object = 'Allergene';


    /**
     * Get a complete list of objects from the model.
     * Call $object list view.
     */
    public static function readAll() {
        $tab_allergene = ModelAllergene::selectAll();

        $view = 'list';
        $pagetitle = 'Liste des allergènes';

        require_once(File::build_path(array('view', 'view.php')));
    }


    /**
     * Call the model to delete an $object where the primary value equal to the one in $_GET.
     * Delete only if the request comes from an admin.
     * Call $object deleted view.
     */
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

    /**
     * Used to call the update view.
     * Pre-fil input in the view with the data got from the model.
     * Only available if the user is connected.
     */
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

    /**
     * Called from the update view with action create.
     * Get date in $_POST and send it to the model to create a new element.
     * Only available if the user is connected.
     */
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

    /**
     * Called from the update view with action update.
     * Get date in $_POST and send it to the model to update an element.
     * Only available if the user is connected.
     */
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