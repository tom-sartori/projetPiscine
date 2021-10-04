<?php

require_once 'Model.php';


class ModelAsso_recette_utilisateur extends Model {

    private $idRecette;
    private $idUtilisateur;

    protected static $nomTable = 'asso_recette_utilisateur';
    protected static $primary = 'idRecette';


    public function __construct($idRecette=NULL, $idUtilisateur=NULL) {
        if (!is_null($idRecette) && !is_null($idUtilisateur)) {
            $this->idRecette = $idRecette;
            $this->idUtilisateur = $idUtilisateur;
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