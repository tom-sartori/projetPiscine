<?php

class Session {

    public static function isUser($login) {
        return (!empty($_SESSION['loginUtilisateur']) && ($_SESSION['loginUtilisateur'] == $login));
    }
}

?>