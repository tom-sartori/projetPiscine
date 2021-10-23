<?php

require_once 'Model.php';


class ModelTaxe extends Model {

    private $idTaxe;
    private $montantTaxe;

    protected static $nomTable = 'taxe';
    protected static $primary = 'idTaxe';
    protected static $object = 'Taxe';


    public function __construct($idTaxe=NULL, $montantTaxe=NULL) {
        if (!is_null($idTaxe) && !is_null($montantTaxe)) {
            $this->idTaxe = $idTaxe;
            $this->montantTaxe = $montantTaxe;
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