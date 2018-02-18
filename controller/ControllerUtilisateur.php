<?php

require_once File:: build_path(array('model', 'ModelUtilisateur.php'));
require_once File:: build_path(array('model', 'ModelConnexion.php'));
require_once File:: build_path(array('model', 'Model.php'));

class ControllerUtilisateur {

    protected static $object = 'Utilisateur';

    /*
     * Fonction de création d'un utilisateur
     * Creation d'une nouvelle ligne dans la table utilisateur, vide
     */

    public static function create() {
        $dataUtilisateur['nom'] = '';
        $dataUtilisateur['prenom'] = '';
        $dataUtilisateur['adresse'] = '';
        $dataUtilisateur['telephone'] = '';
        $dataUtilisateur['email'] = '';
        $dataUtilisateur['login'] = '';
        $dataUtilisateur['mdp'] = '';
        $dataUtilisateur['confirmerMDP'] = '';

        $view = 'create';
        $pagetitle = 'Formulaire Utilisateur';
        $champLog = 'require';
        $action = 'created';
        require_once File:: build_path(array('view', 'view.php'));
    }

    /*
     * Fonction invoquée lors de la création d'un utilisateur
     * Creation d'une nouvelle ligne dans la table utilisateur
     */

    public static function created() {
        $dataUtilisateur['nom'] = $_POST['nom'];
        $dataUtilisateur['prenom'] = $_POST['prenom'];
        $dataUtilisateur['adresse'] = $_POST['adresse'];
        $dataUtilisateur['telephone'] = $_POST['telephone'];
        $dataUtilisateur['email'] = $_POST['email'];
        $dataUtilisateur['competences'] = $_POST['competences'];
        $dataUtilisateur['login'] = $_POST['login'];
        $dataUtilisateur['mdp'] = ControllerSecurity::chiffrer($_POST['mdp']);
        $dataUtilisateur['confirmerMDP'] = ControllerSecurity::chiffrer($_POST['confirmerMDP']);
        if ($dataUtilisateur['mdp'] == $dataUtilisateur['confirmerMDP']) {
            ModelUtilisateur::saveUtilisateur($dataUtilisateur['nom'], $dataUtilisateur['prenom'], $dataUtilisateur['adresse'], $dataUtilisateur['telephone'], $dataUtilisateur['email'], $dataUtilisateur['competences'], 1);
            ModelConnexion::saveConnexion($dataUtilisateur['login'], $dataUtilisateur['mdp'], Model::$pdo->lastInsertId());
            $tab_Utilisateur = ModelUtilisateur::selectAll();
            $view = 'created';
            $pagetitle = 'Utilisateur créé';
            $vLog = htmlspecialchars($dataUtilisateur['login']);
            require File::build_path(array('view', 'view.php'));
        } else {
            $type = "Veuillez saisir correctement le mot de passe.";
            require_once File::build_path(array('view', 'erreur.php'));
        }
    }

    /*
     * Fonction de connexion d'un utilisateur
     */

    public static function connect() {
        if (isset($_SESSION['login'])) {
            $type = "Vous êtes déjà connecté";
            $dataView = ControllerView::prepMenu();
            require_once File::build_path(array('view', 'erreur.php'));
        } else {
            $pagetitle = 'Authentification';
            $view = 'connect';
            $connexionErreur = "";
            $dataView = ControllerView::prepMenu();
            require File::build_path(array('view', 'view.php'));
        }
    }

    /*
     * Fonction invoquée lors de la connexion d'un utilisateur
     */

    public static function connected() {
        //on vérifie qu'il a bien entré le login
        if (empty($_POST['loginUser'])) {
            $type = "Veuillez renseignez les bonnes informations";
            require_once File::build_path(array('view', 'erreur.php'));
            //on vérifie qu'il n'est pas déjà connecté
        } else if (isset($_SESSION['login'])) {
            $type = "Vous êtes déjà connecté";
            require_once File::build_path(array('view', 'erreur.php'));
            //si le formulaire est complet :
        } else {
            $login = $_POST['loginUser'];
            //on chiffre le mot de passe et on recherche dans la base de donn�es ce mot de passe chiffré
            $mdp = ControllerSecurity::chiffrer($_POST['mdp']);
            $idUser = ModelConnexion::getIdentifiant($login); //récupère l'id en tant que string
            //on vérifie que l'utilisateur existe
            $tab_client = ModelConnexion::getLogin($idUser);
            //si aucun utilisateur avec ce login dans la table, on affiche une erreur
            if ($tab_client == false) {
                $connexionErreur = "Nous n'avons aucun utilisateur avec ce login";
                $pagetitle = 'Authentification';
                $view = 'connected';
                require File::build_path(array('view', 'view.php'));
                //on vérifie l'identité de l'utilisateur
            } else {
                $valide = ModelConnexion::checkpassword($login, $mdp);
                //si le couple login/mdp est correct, il est connecté
                if ($valide) {
                    $_SESSION['login'] = $login;
                    //on enregistre son "profil" dans la session
                    // $_SESSION['admin'] = ModelConnexion::UtilisateurAdmin($idUser);
                    //on enregistre l'id de la personne dans $_SESSION
                    $_SESSION['idUtilisateur'] = $idUser;
                    $pagetitle = 'Bienvenue';
                    $view = 'details';
                    require File::build_path(array('view', 'view.php'));

                    //sinon erreur de connexion
                } else {
                    $pagetitle = 'Authentification';
                    $view = "connect";
                    $connexionErreur = "Mot de passe incorrect";
                    require File::build_path(array('view', 'view.php'));
                }
            }
        }
    }

    /*
     * Déconnecte l'utilisateur et détruit la session
     */

    public static function deconnect() {
        unset($_SESSION['login']);
        unset($_SESSION['admin']);
        session_destroy();
        $view = 'deconnected';
        require File::build_path(array('view', 'view.php'));
    }

}
