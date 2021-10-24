<?php

class Session {

    /**
     * Return true if the user logged in has for login $login.
     * @param $login
     * @return bool
     */
    public static function isUser($login) {
        return (!empty($_SESSION['loginUtilisateur']) && ($_SESSION['loginUtilisateur'] == $login));
    }

    /**
     * Return true if the user is logged in.
     * @return bool
     */
    public static function isConnected () {
        return !empty($_SESSION['loginUtilisateur']);
    }

    /**
     * Return true if the user logged in is admin.
     * @return bool
     */
    public static function isAdmin() {
        return (!empty($_SESSION['adminUtilisateur']) && $_SESSION['adminUtilisateur']);
    }
}

?>