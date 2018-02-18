<?php

require_once File::build_path(array('model', 'Model.php'));

class ModelCompetence extends Model {

    /* Nom de la table */
    protected static $object = 'Competence';
    protected static $primary = 'id';

    /* Libellé de la compétence */
    protected $libelle;

    /*
     * Constructeur de la classe
     * @param String $libelle Libellé de la compétence
     */
    function __construct($libelle = NULL) {
        if (!is_null($libelle)) {
            $this->libelle = $libelle;
        }
    }
}
?>
