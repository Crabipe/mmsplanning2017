<?php

require_once File:: build_path(array('model', 'ModelConnexion.php'));

class ControllerUtilisateur {

    protected static $object = 'Utilisateur';

    /*
     * Fonction de création d'un utilisateur
     * Creation d'une nouvelle ligne dans la table utilisateur, vide
     */
    public static function create() {
        $dataUtilisateur['nom'] = '';
        $dataUtilisateur['prenom'] = '';
        $dataUtilisateur['mail'] = '';
        $dataUtilisateur['pseudo'] = '';
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
        $dataUtilisateur['mail'] = $_POST['mail'];
        $dataUtilisateur['pseudo'] = $_POST['pseudo'];
        $dataUtilisateur['mdp'] = ControllerSecurity::chiffrer($_POST['mdp']);
        $dataUtilisateur['confirmerMDP'] = ControllerSecurity::chiffrer($_POST['confirmerMDP']);
        if ($dataUtilisateur['mdp'] == $dataUtilisateur['confirmerMDP']) {
            ModelUtilisateur::saveUtilisateur($dataUtilisateur['nom'], $dataUtilisateur['prenom'], $dataUtilisateur['mail'], $dataUtilisateur['pseudo'], $dataUtilisateur['mdp']);
            $tab_Utilisateur = ModelUtilisateur::selectAll();
            $view = 'created';
            $pagetitle = 'Utilisateur créé';
            $vLog = htmlspecialchars($dataUtilisateur['pseudo']);
            require File::build_path(array('view', 'view.php'));
        } else {
            $type = "Veuillez saisir correctement le mot de passe.";
            require_once File::build_path(array('view', 'erreur.php'));
        }
    }

    /*
     * Fonction de suppression d'un utilisateur
     * Suppression d'une ligne dans la table utilisateur, vide
     */
    public static function delete() {
        $idUtilisateur = $_GET['idUtilisateur'];
        $view = 'delete';
        $pagetitle = "Suppression de l'utilisateur";
        $action = 'deleted';
        require_once File:: build_path(array('view', 'view.php'));
    }

    /*
     * Fonction invoquée lors de la suppression d'un utilisateur
     * Suppression d'une ligne dans la table utilisateur
     */
    public static function deleted() {
        $idUtilisateur = $_GET['idUtilisateur'];
        ModelDocument::deleteDocumentUtilisateur($idUtilisateur);
        ModelAcceder::deleteDroits($idUtilisateur);
        ModelUtilisateur::delete($idUtilisateur);
        
        $view = 'deleted';
        $pagetitle = "Suppression de l'utilisateur";
        require_once File:: build_path(array('view', 'view.php'));
    }

    /*
     * Fonction de modification des informations d'un utilisateur :
     *  - Affichage d'un formulaire pour modifier les informations
     *  - Stockage des informations entrées dans un tableau
     *  - Modification de la base de données avec les champs du tableau
     */
    public static function update() {
        $idUtilisateur = $_GET['idUtilisateur'];
        $tab_Utilisateur = ModelUtilisateur::select($idUtilisateur);
        $dataUtilisateur["nom"] = $tab_Utilisateur->get("nom");
        $dataUtilisateur["prenom"] = $tab_Utilisateur->get("prenom");
        $dataUtilisateur["mail"] = $tab_Utilisateur->get("mail");
        $dataUtilisateur["admin"] = $tab_Utilisateur->get("admin");
        if (ControllerSession::is_admin()){
            $dataUtilisateur['admin'] = $tab_Utilisateur->get('admin');
        }
        $view = 'update';
        $pagetitle = "Mise à jour de l'utilisateur";
        $action = 'updated';
        require_once File:: build_path(array('view', 'view.php'));
    }

    /*
     * Fonction invoquée lors de la mise à jour d'un utilisateur
     * Modification d'une ligne dans la table utilisateur
     */
    public static function updated() {
        $dataUtilisateur['id'] = $_GET['idUtilisateur'];
        $dataUtilisateur['nom'] = $_POST['nom'];
        $dataUtilisateur['prenom'] = $_POST['prenom'];
        $dataUtilisateur['mail'] = $_POST['mail'];
        if (ControllerSession::is_admin()) {
            $dataUtilisateur['admin'] = $_POST['admin'];
        }

        ModelUtilisateur::update($dataUtilisateur);
        $tab_Utilisateur = ModelUtilisateur::selectAll();
        $view = 'updated';
        $pagetitle = 'Utilisateur modifié';
        require File::build_path(array('view', 'view.php'));
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
                $view = 'connectad';
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

    /*
     * Affiche la liste des utilisateurs
     */
    public static function readAll() {
        $tab_Utilisateur = ModelUtilisateur::selectAll();
        $view = 'list';
        $pagetitle = 'liste des utilisateurs';
        require_once File::build_path(array('view', 'view.php'));
    }

    /*
     * Affiche les informations de l'utilisateur sélectionné
     */
    public static function read(){
        if (ControllerSession::is_admin()) {
            $id_utilisateur = $_GET['idUtilisateur'];
        }else {
            $id_utilisateur = $_SESSION['idUtilisateur'];
        }
        $profil = ModelUtilisateur::select($id_utilisateur);
        $view = 'profil';
        $pagetitle = 'Profil utilisateur';
        require_once File::build_path(array('view', 'view.php'));

    }

}
