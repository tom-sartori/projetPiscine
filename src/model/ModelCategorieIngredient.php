<?php

require_once 'Model.php';


/**
 * Class ModelCategorieIngredient
 *
 * Called by Controller and use Model.php to make sql request.
 */
class ModelCategorieIngredient extends Model {

    private $idCategorieIngredient;
    private $nomCategorieIngredient;

    protected static $nomTable = 'categorieIngredient';
    protected static $primary = 'idCategorieIngredient';
    protected static $object = 'CategorieIngredient';


    public function __construct($idCategorieIngredient=NULL, $nomCategorieIngredient=NULL) {
        if (!is_null($idCategorieIngredient) && !is_null($nomCategorieIngredient)) {
            $this->idCategorieIngredient = $idCategorieIngredient;
            $this->nomCategorieIngredient = $nomCategorieIngredient;
        }
    }

    public function get($nom_attribut) {
        if (property_exists($this, $nom_attribut))
            return $this->$nom_attribut;
        return false;
    }

    public function set($nom_attribut, $valeur) {
        if (property_exists($this, $nom_attribut))
            $this->$nom_attribut = $valeur;
        return false;
    }
}

?>