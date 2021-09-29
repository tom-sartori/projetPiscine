<?php

require_once 'Model.php';


class ModelUtilisateur extends Model {

    private $idUtilisateur;
    private $nomUtilisateur;
    private $prenomUtilisateur;

    protected static $nomTable = 'utilisateur';
    protected static $primary = 'idUtilisateur';
    protected static $object= 'Utilisateur';


    public function __construct($idUtilisateur=NULL, $nomUtilisateur=NULL, $prenomUtilisateur=NULL) {
        if (!is_null($idUtilisateur) && !is_null($nomUtilisateur) && !is_null($prenomUtilisateur)) {
            $this->idUtilisateur = $idUtilisateur;
            $this->nomUtilisateur = $nomUtilisateur;
            $this->prenomUtilisateur = $prenomUtilisateur;
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