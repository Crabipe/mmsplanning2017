<?php

require_once File::build_path(array('model', 'Model.php'));

class ModelHoraire extends Model {

    /* Nom de la table */
    protected static $object = 'Horaire';
    protected static $primary = 'id';

    /* Libellé de l'horaire */
    protected $libelle;

    /* Horaire de début du matin */
    protected $debut_matin;

    /* Horaire de fin du matin */
    protected $fin_matin;

    /* Horaire de début de l'après-midi */
    protected $debut_aprem;

    /* Horaire de fin de l'après-midi */
    protected $fin_aprem;

    /*
     * Constructeur de la classe
     * @param String $libelle Libellé de l'horaire
     * @param String $debut_matin Horaire de début du matin
     * @param String $fin_matin Horaire de fin du matin
     * @param String $debut_aprem Horaire de début de l'après-midi
     * @param String $fin_aprem Horaire de de fin de l'après-midi
     */
    function __construct($libelle = NULL, $debut_matin = NULL, $fin_matin = NULL, $debut_aprem = NULL, $fin_aprem = NULL) {
        if (!is_null($libelle) && !is_null($debut_matin) && !is_null($fin_matin) && !is_null($debut_aprem) && !is_null($fin_aprem)) {
            $this->libelle = $libelle;
            $this->debut_matin = $debut_matin;
            $this->fin_matin = $fin_matin;
            $this->debut_aprem = $debut_aprem;
            $this->fin_aprem = $fin_aprem;
        }
    }
}

?>
