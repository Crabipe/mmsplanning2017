<?php

require_once File::build_path(array('config', 'Conf.php'));

/**
 * Modèle standard
 * @package model
 */
class Model {

    static public $pdo;

    /*
     * Initialise la connexion à la base de données
     */
    public static function Init() {
        $login = Conf::getLogin();
        $hostname = Conf::getHostname();
        $database_name = Conf::getDatabase();
        $password = Conf::getPassword();
        try {
            self::$pdo = new PDO("mysql:host=$hostname;dbname=$database_name", $login, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
            }
        }
    }

    /*
     * Retourne un attribut
     * @param String $nom_attribut Nom de l'attribut à retourner
     * @return boolean | String  - false Il n'y a pas d'attribut
     *                        - Nom de l'attribut
     */
    public function get($nom_attribut) {
        if (property_exists($this, $nom_attribut))
            return $this->$nom_attribut;
        return false;
    }

    /*
     * Modifie un attribut
     * @param string $nom_attribut Nom de l'attribut à modifier
     * @param string $valeur Nouvelle valeur de l'attribut
     * @return boolean false Il n'y a pas d'attribut
     */
    public function set($nom_attribut, $valeur) {
        if (property_exists($this, $nom_attribut))
            $this->$nom_attribut = $valeur;
        return false;
    }

    /*
     * Sélectionne toutes les données d'une table
     * @return
     */
    public static function selectAll() {
        $table_name = static::$object;
        $class_name = 'Model' . ucfirst(static::$object);
        try {
            $pdo = Model::$pdo;
            $sql = "SELECT * from $table_name";
            $rep = $pdo->query($sql);
            $rep->setFetchMode(PDO::FETCH_CLASS, $class_name);
            return $rep->fetchAll();
        } catch (PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
            }
            die();
        }
    }

    /*
     * Sélectionne toutes les données d'une table en fonction de la clé primaire
     * @param int $primary_value Clé primaire
     * @return boolean | Model[] - false Il n'y a pas de données
     *                          - Les données retournées
     */
    public static function select($primary_value) {
        $table_name = static::$object;
        $class_name = 'Model' . ucfirst(static::$object);
        $primary_key = static::$primary;
        try {
            $sql = "SELECT * from $table_name WHERE $primary_key=:nom_tag";
            $req_prep = Model::$pdo->prepare($sql);
            $values = array("nom_tag" => $primary_value);
            $req_prep->execute($values);
            $req_prep->setFetchMode(PDO::FETCH_CLASS, $class_name);
            $tab_donnees = $req_prep->fetchAll();
            if (empty($tab_donnees)) {
                return false;
            }
            return $tab_donnees[0];
        } catch (PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
            }
            die();
        }
    }

    /*
     * Supprime une donnée dans une table
     * @param int $primary Clé primaire
     */
    public static function delete($primary) {
        $table_name = static::$object;
        $primary_key = static::$primary;
        try {
            $sql = "delete from $table_name WHERE $primary_key = :tag";
            $req_prep = Model::$pdo->prepare($sql);
            $values = array("tag" => $primary);
            $req_prep->execute($values);
        } catch (PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
            }
            die();
        }
    }

    /*
     * Met à jour un élément dans une table
     * @param $data Donnée à mettre à jour
     */
    public static function update($data) {
        $table_name = static::$object;
        $primary_key = static::$primary;
        $sql = "update $table_name set ";

        foreach ($data as $key => $value) {
            $sql = $sql . $key . "= :tag" . $key . " ,";
        }
        $sql = rtrim($sql, ',');
        $sql = $sql . "where $primary_key = :tag" . $primary_key;
        try {
            $req_prep = Model::$pdo->prepare($sql);

            foreach ($data as $key => $value) {
                $values[":tag" . $key] = $value;
            }
            $req_prep->execute($values);
        } catch (PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
            }
            die();
        }
    }

    /*
     * Sauvegarde les données
     * @param $data Donnée à sauvegarder
     */
    public static function save($data) {
        $table_name = static::$object;

        $sql = "INSERT INTO $table_name(";

        foreach ($data as $key => $value) {
            $sql = $sql . $key . ',';
        }
        $sql = rtrim($sql, ',');
        $sql = $sql . ") values (";

        foreach ($data as $key => $value) {
            $sql = $sql . ":tag" . $key . ',';
        }
        $sql = rtrim($sql, ',');
        $sql = $sql . ")";

        foreach ($data as $key => $value) {
            $values[":tag" . $key] = $value;
        }

        try {
            $req_prep = Model::$pdo->prepare($sql);
            $req_prep->execute($values);
        } catch (PDOException $e) {
            if (strcmp($e->getCode(), "23000") == 0) {
                return "error";
            } else {
                echo $e->getMessage();
            }
        }
    }

}

Model::Init();
