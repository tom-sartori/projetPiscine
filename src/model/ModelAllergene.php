<?php

require_once 'Model.php';


/**
 * Class ModelAllergene
 *
 * Called by Controller and use Model.php to make sql request.
 */
class ModelAllergene extends Model {

    private $idAllergene;
    private $nomAllergene;

    protected static $nomTable = 'allergene';
    protected static $primary = 'idAllergene';
    protected static $object= 'Allergene';


    public function __construct($idAllergene=NULL, $nomAllergene=NULL) {
        if (!is_null($idAllergene) && !is_null($nomAllergene)) {
            $this->idAllergene = $idAllergene;
            $this->nomAllergene = $nomAllergene;
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