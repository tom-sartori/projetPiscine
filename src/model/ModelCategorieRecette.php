<?php

require_once 'Model.php';


/**
 * Class ModelCategorieRecette
 *
 * Called by Controller and use Model.php to make sql request.
 */
class ModelCategorieRecette extends Model {

    private $idCategorieRecette;
    private $nomCategorieRecette;

    protected static $nomTable = 'categorieRecette';
    protected static $primary = 'idCategorieRecette';
    protected static $object = 'CategorieRecette';


    public function __construct($idCategorieRecette=NULL, $nomCategorieRecette=NULL) {
        if (!is_null($idCategorieRecette) && !is_null($nomCategorieRecette)) {
            $this->idCategorieRecette = $idCategorieRecette;
            $this->nomCategorieRecette = $nomCategorieRecette;
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