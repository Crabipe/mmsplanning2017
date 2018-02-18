<?php

require_once File::build_path(array('model', 'Model.php'));

class ModelAcces extends Model {

    /* Nom de la table */
    protected static $object = 'Tache_utilisateur';
    protected static $primary = 'id';

    /* Identifiant de la table Tache */
    protected $id_tache;

    /* Identifiant de la table Utilisateur */
    protected $id_utilisateur;

    /*
     * Constructeur de la classe
     * @param int $id_droit Identifiant de la table Droit
     * @param int $id_utilisateur Identifiant de la table Utilisateur
     * @param int $id_projet Identifiant de la table Projet
     */
    function __construct($id_tache = NULL, $id_utilisateur = NULL) {
        if (!is_null($id_tache) && !is_null($id_utilisateur)) {
            $this->id_tache = $id_tache;
            $this->id_utilisateur = $id_utilisateur;
        }
    }

}

?>
