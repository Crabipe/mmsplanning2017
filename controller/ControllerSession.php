<?php

class ControllerSession {

    protected static $object = 'Session';
    
    /*
     * Vérifie si l'utilisateur connecté est un utilisateur
     */
    public static function is_user() {
        return (!empty($_SESSION['login']));
    }

    /*
     * Vérifie si l'utilisateur conencté est un admin
     */
    public static function is_admin() {
        return (!empty($_SESSION['admin']) && ($_SESSION['admin']));
    }

}
