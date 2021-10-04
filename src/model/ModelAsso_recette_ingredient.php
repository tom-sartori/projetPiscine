<?php

require_once 'Model.php';


class ModelAsso_recette_ingredient extends Model {

    private $idRecette;
    private $idIngredient;
    private $quantiteIngredient;

    protected static $nomTable = 'asso_recette_ingredient';
    protected static $primary = 'idRecette';


    public function __construct($idRecette=NULL, $idIngredient=NULL, $quantiteIngredient=NULL) {
        if (!is_null($idRecette) && !is_null($idIngredient) && !is_null($quantiteIngredient)) {
            $this->idRecette = $idRecette;
            $this->idIngredient = $idIngredient;
            $this->quantiteIngredient = $quantiteIngredient;
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