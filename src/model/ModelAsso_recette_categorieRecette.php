<?php

require_once 'Model.php';

/**
 * Class ModelAsso_recette_categorieRecette
 *
 * Called by Controller and use Model.php to make sql request.
 */
class ModelAsso_recette_categorieRecette extends Model {

    private $idRecette;
    private $idCategorieRecette;

    protected static $nomTable = 'asso_recette_categorieRecette';
    protected static $primary = 'idRecette';


    public function __construct($idRecette=NULL, $idCategorieRecette=NULL) {
        if (!is_null($idRecette) && !is_null($idCategorieRecette)) {
            $this->idRecette = $idRecette;
            $this->idCategorieRecette = $idCategorieRecette;
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