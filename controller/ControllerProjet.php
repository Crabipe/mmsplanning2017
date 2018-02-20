<?php

require_once File:: build_path(array('model', 'ModelProjet.php'));
require_once File:: build_path(array('model', 'Model.php'));

class ControllerProjet {

    protected static $object = 'Projet';
	
public static function create() {
        $data['nom'] = '';
        $data['id_chefProjet'] = '';
        $data['adresse'] = '';
        $data['commentaire'] = '';
        $data['date_debut'] = '';
        $data['date_fin'] = '';
        $data['etat'] = '';

        $view = 'create';
        $pagetitle = 'Formulaire Projet';
        $champLog = 'require';
        $action = 'saveAProject';
        require_once File:: build_path(array('view', 'view.php'));
    }
	
    public static function update() {
        //on récupère l'id du projet
        $id = $_GET['id'];
        
        //on accède aux données du projet actuel
        $tab_Projet = ModelProjet::select($id);
<<<<<<< HEAD
        
        //on convertit la date pour l'afficher
        $date_debut = Model::convertirDateAffichage($tab_Projet ->get('date_debut')) ;
        $date_fin = Model::convertirDateAffichage($tab_Projet ->get('date_fin')) ;
=======
>>>>>>> d950b9d3221c3b5aefe7abe8e175fa3b5b514d0e
       
        //on récupère les données actuelles dans le tableau "data"
        $data['nom'] = $tab_Projet ->get('nom');
        $data['id_chefProjet'] = $tab_Projet ->get('id_chefProjet');
        $data['adresse'] = $tab_Projet ->get('adresse');
        $data['commentaire'] = $tab_Projet ->get('nom');
<<<<<<< HEAD
        $data['date_debut'] = $date_debut;
        $data['date_fin'] = $date_fin;
=======
        $data['date_debut'] = $tab_Projet ->get('date_debut');
        $data['date_fin'] = $tab_Projet ->get('date_fin');
>>>>>>> d950b9d3221c3b5aefe7abe8e175fa3b5b514d0e
        $data['etat'] = $tab_Projet ->get('etat');

        //on appelle la vue "update" pour afficher un formulaire pré-rempli avec data
        $view = 'update';
        $action = 'updated';
        $pagetitle = 'Formulaire Projet';
        $vId = htmlspecialchars($_GET['id']);
        require_once File:: build_path(array('view', 'view.php'));
    }
	
	public static function saveAProject() {
                $projet = new ModelProjet();
                //on modifie la date pour l'enregistrer en DateTime
                //ici le format entré jj/mm/aaaa devient aaaa-mm-jj
<<<<<<< HEAD
                $date_debut = Model::convertirDateBDD($_POST['date_debut']) ;
                $date_fin = Model::convertirDateBDD($_POST['date_fin']) ;
=======
                $date_debut = static::convertirDate($_POST['date_debut']) ;
                $date_fin = static::convertirDate($_POST['date_fin']) ;
                var_dump($date_debut);
                var_dump($date_fin);
>>>>>>> d950b9d3221c3b5aefe7abe8e175fa3b5b514d0e
                if (isset($_GET['id'])){
                    $data = array(
                        'id' => $_GET['id'],
			'nom' => $_POST['nom'],
			'adresse' => $_POST['adresse'],
			'commentaire' => $_POST['commentaire'],
                        'date_debut' => $date_debut,
                        'id_chefProjet' => $_POST['id_chefProjet'],
			'date_fin' => $date_fin,
			'etat' => $_POST['etat'],
			//'json' => $_POST['json'],
		);
                }else {
                    $data = array(
			'nom' => $_POST['nom'],
			'adresse' => $_POST['adresse'],
			'commentaire' => $_POST['commentaire'],
                        'date_debut' => $date_debut,
                        'id_chefProjet' => $_POST['id_chefProjet'],
			'date_fin' => $date_fin,
			'etat' => $_POST['etat'],
			//'json' => $_POST['json'],
		);
                }
		echo $projet->save($data);
	}
	
	public static function deleteAProject(){
        //echo $weekplanner->delete($_POST['id']);
	echo $projet->delete($_POST['id']);
	}
<<<<<<< HEAD
=======
        
        public static function convertirDate($date){
            list($jour, $mois, $an) = explode("/", $date);
            $valide = checkdate($mois, $jour, $an);
            if ($valide){
                return $an."-".$mois."-".$jour;
            }
            else {
                echo "La date saisie n'existe pas";
            }
            
        }
>>>>>>> d950b9d3221c3b5aefe7abe8e175fa3b5b514d0e
}
	
	
	
	
	