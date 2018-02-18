<?php

require_once File::build_path(array('model', 'Model.php'));

class ModelAcces extends Model {

    /* Nom de la table */
    protected static $object = 'Acces';

    /* Identifiant de la table Droit */
    protected $id_droit;

    /* Identifiant de la table Utilisateur */
    protected $id_utilisateur;

    /* Identifiant de la table Projet */
    protected $id_projet;

    /*
     * Constructeur de la classe
     * @param int $id_droit Identifiant de la table Droit
     * @param int $id_utilisateur Identifiant de la table Utilisateur
     * @param int $id_projet Identifiant de la table Projet
     */
    function __construct($id_droit = NULL, $id_utilisateur = NULL, $id_projet = NULL) {
        if (!is_null($id_droit) && !is_null($id_utilisateur) && !is_null($id_projet)) {
            $this->id_droit = $id_droit;
            $this->id_utilisateur = $id_utilisateur;
            $this->id_projet = $id_projet;
        }
    }

}

?>
