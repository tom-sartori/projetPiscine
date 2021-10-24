<?php
require_once (File::build_path(array('model', 'ModelCategorieRecette.php')));


/**
 * Class ControllerCategorieRecette
 *
 * The controller is used between the model and the view. It receives the data from the model, make changes et send it to the right view.
 */
class ControllerCategorieRecette {

    protected static $object = 'CategorieRecette';


    /**
     * Get a complete list of objects from the model.
     * Call $object list view.
     */
    public static function readAll() {
        $tab_categorieRecette = ModelCategorieRecette::selectAll();

        $view = 'list';
        $pagetitle = 'Liste des catégories';

        require_once(File::build_path(array('view', 'view.php')));
    }

    /**
     * Call the model to delete an $object where the primary value equal to the one in $_GET.
     * Delete only if the request comes from an admin.
     * Call $object deleted view.
     */
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

    /**
     * Used to call the update view.
     * Pre-fil input in the view with the data got from the model.
     * Only available if the user is connected.
     */
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

    /**
     * Called from the update view with action create.
     * Get date in $_POST and send it to the model to create a new element.
     * Only available if the user is connected.
     */
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

    /**
     * Called from the update view with action update.
     * Get date in $_POST and send it to the model to update an element.
     * Only available if the user is connected.
     */
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