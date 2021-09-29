<?php

class Security {

    private static $seed="idfhdfhfsdbfsdhfSDFGJSFIGQFI86453456486";

    public static function hacher($texte_en_clair) {
        $textebis= self::$seed . $texte_en_clair;
        $texte_hache = hash('sha256', $textebis);
        return $texte_hache;
    }
}

?>