<?php

require_once File::build_path(array('model', 'Model.php'));

class ModelConnexion extends Model {

    /* Nom de la table */
    protected static $object = 'Connexion';
    protected static $primary = 'id';

    /* Login de la connexion */
    protected $login;

    /* Mot de passe de connexion */
    protected $password;

    /* Identifiant de la table Utilisateur */
    protected $id_utilisateur;

    /*
     * Constructeur de la classe
     * @param String $login Login de connexion
     * @param String $password Mot de passe de connexion
     * @param int $id_utilisateur Identifiant de la table Utilisateur
     */
    function __construct($login = NULL, $password = NULL, $id_utilisateur = NULL) {
        if (!is_null($login) && !is_null($password) && !is_null($id_utilisateur)) {
            $this->login = $login;
            $this->password = $password;
            $this->id_utilisateur = $id_utilisateur;
        }
    }

    /*
     * Retourne l'identifiant de connexion
     * @param String $login Login de la connexion
     * @return boolean | int - false is la requête ne retourne pas d'identifiant
     *                      - Identifiant de connexion
     */
    public static function getIdentifiant($login) {
        $sql = "SELECT id FROM Connexion WHERE login = :login";
        $values = array("login" => $login);
        try {
            $req_prep = Model::$pdo->prepare($sql);
            $req_prep->execute($values);
            $idConnexion = $req_prep->fetchAll();
            if (empty($idConnexion)) {
                return false;
            }
            return $idConnexion[0][0];
        } catch (PDOException $e) {
            if (strcmp($e->getCode(), "23000") == 0) {
                return "error";
            } else {
                echo $e->getMessage();
            }
        }
    }

    /*
     * Retourne le login de l'utilisateur connecté
     * @param int $id Identifiant de connexion
     * @return boolean | String - false si la requête ne retourne pas d'identifiant
     *                      - Login de l'utilisateur connecté
     */
    public static function getLogin($id) {
        $sql = "SELECT login FROM Connexion WHERE id = :id";
        $values = array("id" => $id);
        try {
            $req_prep = Model::$pdo->prepare($sql);
            $req_prep->execute($values);
            $login = $req_prep->fetchAll();
            if (empty($login)) {
                return false;
            }
            return $login[0][0];
        } catch (PDOException $e) {
            if (strcmp($e->getCode(), "23000") == 0) {
                return "error";
            } else {
                echo $e->getMessage();
            }
        }
    }

    /*
     * Retourne le mot de passe de l'utilisateur connecté
     * @param int $id Identifiant de connexion
     * @return boolean | String - false si la requête ne retourne pas d'identifiant
     *                      - Mot de passe de l'utilisateur connecté
     */
    public static function getPassword($id) {
        $sql = "SELECT password FROM Connexion WHERE id = :id";
        $values = array("id" => $id);
        try {
            $req_prep = Model::$pdo->prepare($sql);
            $req_prep->execute($values);
            $password = $req_prep->fetchAll();
            if (empty($password)) {
                return false;
            }
            return $password[0][0];
        } catch (PDOException $e) {
            if (strcmp($e->getCode(), "23000") == 0) {
                return "error";
            } else {
                echo $e->getMessage();
            }
        }
    }
	
	/*
	 * Vérifie si le couple loginVerif / mdpVerif existe dans la base de données
	 * @Param String $loginVerif le login saisi par l'utilisateur 
	 * @Param String $mdpVerif le mot de passe saisi par l'utilisateur
	 * @return boolean 	- true si le couple existe 
	 *					- false sinon
	 */
	public static function checkpassword($loginVerif, $mdpVerif) {
		$id = Self::getIdentifiant($loginVerif);
		$mdp = Self::getPassword($id);
		
		if ($mdp == $mdpVerif) {
			return true;
		}else {
			return false;
		}
	}

}

?>
