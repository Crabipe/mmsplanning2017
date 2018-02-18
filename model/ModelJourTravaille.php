<?php

require_once File::build_path(array('model', 'Model.php'));

class ModelJourTravaille extends Model {

    /* Nom de la table */
    protected static $object = 'Jour_Travaille';

    /* Identifiant du jour */
    protected $id_jour;

    /* Identifiant de la semaine */
    protected $id_modele_semaine;

    /*
     * Constructeur de la classe
     * @param int $id_jour Identifiant du Jour
     * @param int $id_modele_semaine Identifiant de la semaine
     */
    function __construct($id_jour = NULL, $id_modele_semaine = NULL) {
        if (!is_null($id_jour) && !is_null($id_modele_semaine)) {
            $this->id_jour = $id_jour;
            $this->id_modele_semaine = $id_modele_semaine;
        }
    }

}
