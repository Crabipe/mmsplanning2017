<?php

class ControllerSecurity {

    private static $seed = 'CeciEstNotreProjetPHP12';
    
    /*
     * Retourne le seed
     */
    public static function getSeed() {
        return self::$seed;
    }

    /*
     * Chiffre le texte choisi
     */
    public static function chiffrer($texte) {
        $texte = $texte . self::getSeed();
        $texte_chiffre = hash('sha256',$texte);
        return $texte_chiffre;
    }
}