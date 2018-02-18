<?php

require_once File::build_path(array('model', 'Model.php'));

class ModelUtilisateur extends Model {

    /* Nom de la table */
    protected static $object = 'Utilisateur';
    protected static $primary = 'id';

    /* Nom de l'utilisateur */
    protected $nom;

    /* Prénom de l'utilisateur */
    protected $prenom;

    /* Adresse de l'utilisateur */
    protected $adresse;

    /* Téléphone de l'utilisateur */
    protected $telephone;

    /* Email de l'utilisateur */
    protected $email;

    /* Etat de l'utilisateur (activé ou désactivé) */
    protected $etat;

    /* Identifiant de la table Horaire */
    protected $id_horaire;

    /* Identifiant de la table Modele_semaine */
    protected $id_modele_semaine;

    /* Identifiant de la table Competence */
    protected $id_competence;

    /*
     * Constructeur de la classe
     * @param String $nom Nom de l'utilisateur
     * @param String $prenom Prénom de l'utilisateur
     * @param String $adresse Adresse de l'utilisateur
     * @param String $telephone Téléphone de l'utilisateur
     * @param String $email Email de l'utilisateur
     * @param boolean $etat Etat de l'utilisateur
     * @param int $id_horaire Identifiant de la table Horaire
     * @param int $id_modele_semaine Identifiant de la table Modele_semaine
     * @param int $id_competence Identifiant de la table Competence
     */
    function __construct($nom = NULL, $prenom = NULL, $adresse = NULL, $telephone = NULL, $email = NULL, $etat = NULL, $id_horaire = NULL, $id_modele_semaine = NULL, $id_competence = NULL) {
        if (!is_null($nom) && !is_null($prenom) && !is_null($adresse) && !is_null($telephone) && !is_null($email) && !is_null($etat) && !is_null($id_horaire) && !is_null($id_modele_semaine) && !is_null($id_competence)) {
            $this->nom = $nom;
            $this->prenom = $prenom;
            $this->adresse = $adresse;
            $this->telephone = $telephone;
            $this->email = $email;
            $this->etat = $etat;
            $this->id_horaire = $id_horaire;
            $this->id_modele_semaine = $id_modele_semaine;
            $this->id_competence = $id_competence;
        }
    }

}

?>
