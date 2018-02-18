<?php

require_once File::build_path(array('model', 'Model.php'));

class ModelTache extends Model {

    /* Nom de la table */
    protected static $object = 'Tache';
    protected static $primary = 'id';

    /* Libellé de la tâche */
    protected $libelle;

    /* Date de début de la tâche */
    protected $date_debut;

    /* Date de fin de la tâche */
    protected $date_fin;

    /* Heure de début de la tâche */
    protected $heure_debut;

    /* Heure de fin de la tâche */
    protected $heure_fin;

    /* Identifiant du projet */
    protected $id_projet;

    /*
     * Constructeur de la classe
     * @param String $libelle Libellé de la tâche
     * @param String $date_debut Date de début de la tâche
     * @param String $date_fin Date de fin de la tâche
     * @param String $heure_debut Heure de début de la tâche
     * @param String $heure_fin Heure de fin de la tâche
     * @param int $id_projet Identifiant du projet
     */
    function __construct($libelle = NULL, $date_debut = NULL, $date_fin = NULL, $heure_debut = NULL, $heure_fin = NULL, $id_projet = NULL) {
        if (!is_null($libelle) && !is_null($date_debut) && !is_null($date_fin) && !is_null($heure_debut) && !is_null($heure_fin) && !is_null($id_projet)) {
            $this->libelle = $libelle;
            $this->date_debut = $date_debut;
            $this->date_fin = $date_fin;
            $this->heure_debut = $heure_debut;
            $this->heure_fin = $heure_fin;
            $this->id_projet = $id_projet;
        }
    }
}

?>
