<?php

require_once File::build_path(array('model', 'Model.php'));

class ModelModele_semaine extends Model {

    /* Nom de la table */
    protected static $object = 'Modele_semaine';
    protected static $primary = 'id';

    /* Libellé de la semaine */
    protected $libelle;

    /*
     * Constructeur de la classe
     * @param String $libelle Le libellé de la semaine
     */
    function __construct($libelle = NULL) {
        if (!is_null($libelle)) {
            $this->libelle = $libelle;
        }
    }

}

?>
