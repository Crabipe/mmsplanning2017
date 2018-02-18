<?php

require_once File::build_path(array('model', 'Model.php'));

    class ModelDocument extends Model {

    /* Nom de la table */
    protected static $object = 'Document';
    protected static $primary = 'id';

    /* Titre du document */
    protected $titre;

    /* Chemin du document */
    protected $chemin;
    
    /* Identifiant de la tâche */
    protected $id_tache;

    /* Identifiant du projet */
    protected $id_projet;

    /* Identifiant de l'utilisateur */
    protected $id_utilisateur;

    /*
     * Constructeur de la classe
     * @param String $titre Titre du document
     * @param String $chemin Chemin du document
     * @param int $id_projet Identifiant du projet
     * @param int $id_utilisateur Identifiant de l'utilisateur
     */
    function __construct($titre = NULL, $chemin = NULL, $id_tache = NULL, $id_projet = NULL, $id_utilisateur = NULL) {
        if (!is_null($titre) && !is_null($chemin) && !is_null($id_tache) && !is_null($id_projet) && !is_null($id_utilisateur)) {
            $this->titre = $titre;
            $this->chemin = $chemin;
            $this->id_tache = $id_tache;
            $this->id_projet = $id_projet;
            $this->id_utilisateur = $id_utilisateur;
        }
    }
}

?>
