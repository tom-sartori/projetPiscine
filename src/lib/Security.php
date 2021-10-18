<?php

class Security {

    // Seed ajouté au début du mdp afin d'éviter les attaques dictionnaires.
    private static $seed="Nf0J51GSPVtbz6F6tRU7";

    // Permet de "hasher" le mdp en param.
    public static function hasher ($clearPassword) {
        return hash('sha256', self::$seed . $clearPassword);
    }
}

?>