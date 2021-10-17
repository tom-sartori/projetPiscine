<?php

require_once 'Model.php';


class ModelUtilisateur extends Model {

    private $loginUtilisateur;
    private $nomUtilisateur;
    private $prenomUtilisateur;

    protected static $nomTable = 'utilisateur';
    protected static $primary = 'loginUtilisateur';
    protected static $object= 'Utilisateur';


    public function __construct($loginUtilisateur=NULL, $nomUtilisateur=NULL, $prenomUtilisateur=NULL) {
        if (!is_null($loginUtilisateur) && !is_null($nomUtilisateur) && !is_null($prenomUtilisateur)) {
            $this->loginUtilisateur = $loginUtilisateur;
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

    public static function checkPassword ($loginUtilisateur, $hashedPassword) {
        try{
            $sql = '
                SELECT COUNT(*) 
                FROM ' . static::$nomTable . ' 
                WHERE loginUtilisateur =:login AND mdpUtilisateur = :mdp;';

            $values = array(
                "login" => $loginUtilisateur,
                "mdp" => $hashedPassword
            );
            $req_prep = Model::$pdo->prepare($sql);
            $req_prep->execute($values);
            $result = $req_prep->fetch()['COUNT(*)'];
        }
        catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
        return $result == 1;
    }
}

?>