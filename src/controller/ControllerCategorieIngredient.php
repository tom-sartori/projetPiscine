<?php
require_once (File::build_path(array('model', 'ModelCategorieIngredient.php')));

/**
 * Class ControllerCategorieIngredient
 *
 * The controller is used between the model and the view. It receives the data from the model, make changes et send it to the right view.
 */
class ControllerCategorieIngredient {

    protected static $object = 'CategorieIngredient';


    /**
     * Get a complete list of objects from the model.
     * Call $object list view.
     */
    public static function readAll() {
        $tab_categorieIngredient = ModelCategorieIngredient::selectAll();

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
            ModelCategorieIngredient::delete($_GET['idCategorieIngredient']);

            $tab_categorieIngredient = ModelCategorieIngredient::selectAll();

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
            $idCategorieIngredient = '';
            $nomCategorieIngredient = '';

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
            $idCategorieIngredient = htmlspecialchars("" . $_GET['idCategorieIngredient']);
            $categorieIngredient = ModelCategorieIngredient::select($idCategorieIngredient);

            $nomCategorieIngredient = htmlspecialchars("{$categorieIngredient->get('nomCategorieIngredient')}");


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
                'nomCategorieIngredient' => $_POST['nomCategorieIngredient']);
            $erreur = ModelCategorieIngredient::save($data);

            if ($erreur == 0) {
                $view = 'error';
                $pagetitle = 'Erreur de création';
            } else {
                $tab_categorieIngredient = ModelCategorieIngredient::selectAll();

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
                'nomCategorieIngredient' => $_POST['nomCategorieIngredient']);

            $idCategorieIngredient = $_POST['idCategorieIngredient'];
            $erreur = ModelCategorieIngredient::update($data, $idCategorieIngredient);

            if ($erreur == 0) {
                $view = 'error';
                $pagetitle = 'Erreur mise à jour';
            } else {
                $tab_categorieIngredient = ModelCategorieIngredient::selectAll();

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
