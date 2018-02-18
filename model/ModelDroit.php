<?php

require_once File::build_path(array('model', 'Model.php'));

class ModelDroit extends Model {

    /* Nom de la table */
    protected static $object = 'Utilisateur';
    protected static $primary = 'id';

    /* Libellé du droit */
    protected $libelle;

    /*
     * Constructeur de la classe
     * @param String $libelle Libellé du droit
     */
    function __construct($libelle = NULL) {
        if (!is_null($libelle)) {
            $this->libelle = $libelle;
        }
    }

    /*
     * Retourne le libellé du droit
     * @param int $id Identifiant du droit
     * @return boolean | String - false is la requête ne retourne pas de libellé
     *                      - Libellé du droit
     */
    public static function getLibelle($id) {
        $sql = "SELECT libelle FROM Droit WHERE id = :id";
        $values = array("id" => $id);
        try {
            $req_prep = Model::$pdo->prepare($sql);
            $req_prep->execute($values);
            $libelle = $req_prep->fetchAll();
            if (empty($libelle)) {
                return false;
            }
            return $libelle[0][0];
        } catch (PDOException $e) {
            if (strcmp($e->getCode(), "23000") == 0) {
                return "error";
            } else {
                echo $e->getMessage();
            }
        }
    }

}

?>
