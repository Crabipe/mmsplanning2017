<?php

require_once File::build_path(array('model', 'Model.php'));

class ModelProjet extends Model {

    /* Nom de la table */
    protected static $object = 'Projet';
    protected static $primary = 'id';

    /* Nom du projet */
    protected $nom;
    
    /* Chef du projet */
    protected $id_chefProjet;

    /* Adresse du projet */
    protected $adresse;

    /* Commentaires du projet */
    protected $commentaire;

    /* Date de début du projet */
    protected $date_debut;

    /* Date de fin du projet */
    protected $date_fin;

    /* Etat du projet */
    protected $etat;

    /*
     * Constructeur de la classe
     * @param String $nom Nom du projet
     * @param int $id_chefProjet Chef du projet
     * @param String $adresse Adresse du projet
     * @param String $commentaire Commentaires du projet
     * @param String $date_debut Date de début du projet
     * @param String $date_fin Date de fin du projet
     * @param boolean $etat Etat du projet
     */
    function __construct($nom = NULL, $id_chefProjet = NULL, $adresse = NULL, $commentaire = NULL, $date_debut = NULL, $date_fin = NULL, $etat = NULL) {
        if (!is_null($nom) && !is_null($id_chefProjet) && !is_null($adresse) && !is_null($commentaire) && !is_null($date_debut) && !is_null($date_fin) && !is_null($etat)) {
            $this->nom = $nom;
            $this->id_chefProjet = $id_chefProjet;
            $this->adresse = $adresse;
            $this->commentaire = $commentaire;
            $this->date_debut = $date_debut;
            $this->date_fin = $date_fin;
            $this->etat = $etat;
        }
    }

}

?>
