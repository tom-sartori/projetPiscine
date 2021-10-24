<?php
require_once (File::build_path(array('model', 'ModelIngredient.php')));


/**
 * Class ControllerIngredient
 *
 * The controller is used between the model and the view. It receives the data from the model, make changes et send it to the right view.
 */
class ControllerIngredient {

    protected static $object = 'Ingredient';


    /**
     * Get a complete list of objects from the model.
     * Call $object list view.
     */
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

    /**
     * Call the model to delete an $object where the primary value equal to the one in $_GET.
     * Delete only if the request comes from an admin.
     * Call $object deleted view.
     */
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
            $idIngredient = '';
            $nomIngredient = '';
            $quantiteAchat = '';
            $idUniteQuantite = '';
            $prixHT = '';
            $idTaxe = '';
            $idCategorieIngredient = '';
            $idAllergene = '';

            $tabCategorieIngredient = ModelCategorieIngredient::selectAll();
            $tabAllergene = ModelAllergene::selectAll();
            $tabUniteQuantite = ModelUniteQuantite::selectAll();
            $tabTaxe = ModelTaxe::selectAll();

            $view = 'update';
            $pagetitle = 'Formulaire d\'ajout d\'ingrédient';

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
            $idIngredient = htmlspecialchars("" . $_GET['idIngredient']);
            $ingredient = ModelIngredient::select($idIngredient);

            $nomIngredient = htmlspecialchars("{$ingredient->get('nomIngredient')}");
            $quantiteAchat = htmlspecialchars("{$ingredient->get('quantiteAchat')}");
            $idUniteQuantite = htmlspecialchars("{$ingredient->get('idUniteQuantite')}");
            $prixHT = htmlspecialchars("{$ingredient->get('prixHT')}");
            $idTaxe = htmlspecialchars("{$ingredient->get('idTaxe')}");
            $idCategorieIngredient = htmlspecialchars("{$ingredient->get('idCategorieIngredient')}");
            $idAllergene = htmlspecialchars("{$ingredient->get('idAllergene')}");

            $tabCategorieIngredient = ModelCategorieIngredient::selectAll();
            $tabAllergene = ModelAllergene::selectAll();
            $tabUniteQuantite = ModelUniteQuantite::selectAll();
            $tabTaxe = ModelTaxe::selectAll();

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

    /**
     * Called from the update view with action update.
     * Get date in $_POST and send it to the model to update an element.
     * Only available if the user is connected.
     */
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

    /**
     * Get the data of 'uniteQuantite' and 'taxe' by using their models.
     * Call the view 'taxeUnit'.
     * Only available if the user is connected.
     */
    public static function taxeUnite () {
        if (Session::isConnected()) {
            $tabUnite = ModelUniteQuantite::selectAll();
            $tabTaxe = ModelTaxe::selectAll();

            $view = 'taxeUnite';
            $pagetitle = 'Taxes et unitées';

            require_once(File::build_path(array('view', 'view.php')));
        }
        else {
            self::error();
        }
    }

    /**
     * Called from 'taxeUnit' view to create a new tax.
     */
    public static function createTaxe () {
        if (Session::isConnected()) {
            ModelTaxe::save(array('montantTaxe' => $_POST['montantTaxe']));

            self::taxeUnite();
        }
        else {
            self::error();
        }
    }

    /**
     * Called from 'taxeUnit' view to update an existent tax.
     */
    public static function updateTaxe () {
        if (Session::isConnected()) {
            ModelTaxe::update(array('montantTaxe' => $_POST['montantTaxe']), $_POST['idTaxe']);
            self::taxeUnite();
        }
        else {
            self::error();
        }
    }

    /**
     * Called from 'taxeUnit' view to create a new unit.
     */
    public static function createUnite () {
        if (Session::isConnected()) {
            ModelUniteQuantite::save(array('nomUnite' => $_POST['nomUnite']));

            self::taxeUnite();
        }
        else {
            self::error();
        }
    }

    /**
     * Called from 'taxeUnit' view to update an existent unit.
     */
    public static function updateUnite () {
        if (Session::isConnected()) {
            ModelUniteQuantite::update(array('nomUnite' => $_POST['nomUnite']), $_POST['idUnite']);
            self::taxeUnite();
        }
        else {
            self::error();
        }
    }
}