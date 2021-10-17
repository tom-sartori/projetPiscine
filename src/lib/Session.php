<?php

class Session {

    public static function isUser($login) {
        return (!empty($_SESSION['loginUtilisateur']) && ($_SESSION['loginUtilisateur'] == $login));
    }

    public static function isConnected () {
        return !empty($_SESSION['loginUtilisateur']);
    }

    public static function isAdmin() {
        return (!empty($_SESSION['adminUtilisateur']) && $_SESSION['adminUtilisateur']);
    }
}

?>