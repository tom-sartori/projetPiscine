<?php

require_once 'Model.php';


/**
 * Class ModelRecette
 *
 * Called by Controller and use Model.php to make sql request.
 */
class ModelRecette extends Model {

    private $idRecette;
    private $nomRecette;
    private $nbCouvert;
    private $descriptif;
    private $coefficient;
    private $chargeSalariale;

    protected static $nomTable = 'recette';
    protected static $primary = 'idRecette';
    protected static $object= 'Recette';


    public function __construct($idRecette=NULL, $nomRecette=NULL, $nbCouvert=NULL, $descriptif=NULL, $coefficient=NULL, $chargeSalariale=NULL) {
        if (!is_null($idRecette) && !is_null($nomRecette) && !is_null($nbCouvert) && !is_null($descriptif) && !is_null($coefficient) && !is_null($chargeSalariale)) {
            $this->idRecette = $idRecette;
            $this->nomRecette = $nomRecette;
            $this->nbCouvert = $nbCouvert;
            $this->descriptif = $descriptif;
            $this->coefficient = $coefficient;
            $this->chargeSalariale = $chargeSalariale;
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

    public static function getLastId () {
        $sql = 'SELECT MAX(' . static::$primary . ') FROM ' . static::$nomTable . ';';
        $req_prep = Model::$pdo->prepare($sql);
        $req_prep->execute();
        $req_prep->setFetchMode(PDO::FETCH_NUM);
        return $req_prep->fetchAll();
    }
}

?>