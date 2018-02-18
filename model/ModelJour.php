<?php

require_once File::build_path(array('model', 'Model.php'));

class ModelJour extends Model {

    /* Nom de la table */
    protected static $object = 'Jour';
    protected static $primary = 'id';

    /* Libellé du jour */
    protected $libelle;

    /*
     * Constructeur de la classe
     * @param String $libelle Libellé du jour
     */
    function __construct($libelle = NULL) {
        if (!is_null($libelle)) {
            $this->libelle = $libelle;
        }
    }

}
