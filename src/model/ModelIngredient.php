<?php

require_once 'Model.php';
require_once File::build_path(array('model', 'ModelUniteQuantite.php'));
require_once File::build_path(array('model', 'ModelTaxe.php'));


/**
 * Class ModelIngredient
 *
 * Called by Controller and use Model.php to make sql request.
 */
class ModelIngredient extends Model {

    private $idIngredient;
    private $nomIngredient;
    private $quantiteAchat;
    private $idUniteQuantite;
    private $prixHT;
    private $idTaxe;
    private $idCategorieIngredient;
    private $idAllergene;

    protected static $nomTable = 'ingredient';
    protected static $primary = 'idIngredient';
    protected static $object= 'Ingredient';


    public function __construct($idIngredient=NULL, $nomIngredient=NULL, $quantiteAchat=NULL, $idUniteQuantite=NULL, $prixHT=NULL, $idTaxe=NULL, $idCategorieIngredient=NULL, $idAllergene=NULL) {
        if (!is_null($idIngredient) && !is_null($nomIngredient) && !is_null($quantiteAchat) && !is_null($idUniteQuantite) && !is_null($prixHT) && !is_null($idTaxe) && !is_null($idCategorieIngredient) && !is_null($idAllergene)) {
            $this->idIngredient = $idIngredient;
            $this->nomIngredient = $nomIngredient;
            $this->quantiteAchat = $quantiteAchat;
            $this->idUniteQuantite = $idUniteQuantite;
            $this->prixHT = $prixHT;
            $this->idTaxe = $idTaxe;
            $this->idCategorieIngredient = $idCategorieIngredient;
            $this->idAllergene = $idAllergene;
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