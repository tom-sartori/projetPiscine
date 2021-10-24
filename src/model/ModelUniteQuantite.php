<?php

require_once 'Model.php';


/**
 * Class ModelUniteQuantite
 *
 * Called by Controller and use Model.php to make sql request.
 */
class ModelUniteQuantite extends Model {

    private $idUnite;
    private $nomUnite;

    protected static $nomTable = 'uniteQuantite';
    protected static $primary = 'idUnite';
    protected static $object = 'UniteQuantite';


    public function __construct($idUnite=NULL, $nomUnite=NULL) {
        if (!is_null($idUnite) && !is_null($nomUnite)) {
            $this->idUnite = $idUnite;
            $this->nomUnite = $nomUnite;
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