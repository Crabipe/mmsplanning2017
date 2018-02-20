<?php

require_once File:: build_path(array('model', 'ModelTache.php'));
require_once File:: build_path(array('model', 'Model.php'));

class ControllerTache {

    protected static $object = 'Tache';
<<<<<<< HEAD

    public static function create() {
        $data['libelle'] = '';
        $data['date_debut'] = '';
        $data['date_fin'] = '';
        $data['heure_debut'] = '';
        $data['heure_fin'] = '';
        $data['id_projet'] = '';

        $view = 'create';
        $pagetitle = 'Formulaire Tache';
        $champLog = 'require';
        $action = 'saveAProject';
        $idProjet = htmlspecialchars($_GET['idProjet']);
        require_once File:: build_path(array('view', 'view.php'));
    }

=======
	
    public static function create() {
            $data['libelle'] = '';
            $data['date_debut'] = '';
            $data['date_fin'] = '';
            $data['heure_debut'] = '';
            $data['heure_fin'] = '';
            $data['id_projet'] = '';

            $view = 'create';
            $pagetitle = 'Formulaire Tache';
            $champLog = 'require';
            $action = 'saveAProject';
            $idProjet = htmlspecialchars($_GET['idProjet']);
            require_once File:: build_path(array('view', 'view.php'));
    }
    
>>>>>>> d950b9d3221c3b5aefe7abe8e175fa3b5b514d0e
    public static function update() {
        //on récupère l'id du projet
        $id = $_GET['id'];
        //on accède aux données du projet actuel
        $tab_Tache = ModelTache::select($id);
        //on récupère les données actuelles dans le tableau "data"
<<<<<<< HEAD
        $data['libelle'] = $tab_Tache->get('libelle');
        $data['date_debut'] = $tab_Tache->get('date_debut');
        $data['date_fin'] = $tab_Tache->get('date_fin');
        $data['heure_debut'] = $tab_Tache->get('heure_debut');
        $data['heure_fin'] = $tab_Tache->get('heure_fin');
=======
        $data['libelle'] = $tab_Tache ->get('libelle');
        $data['date_debut'] = $tab_Tache ->get('date_debut');
        $data['date_fin'] = $tab_Tache ->get('date_fin');
        $data['heure_debut'] = $tab_Tache ->get('heure_debut');
        $data['heure_fin'] = $tab_Tache ->get('heure_fin');
>>>>>>> d950b9d3221c3b5aefe7abe8e175fa3b5b514d0e

        //on appelle la vue "update" pour afficher un formulaire pré-rempli avec data
        $view = 'update';
        $action = 'updated';
        $pagetitle = 'Formulaire Tache';
        $id = htmlspecialchars($_GET['id']);
        $idProjet = htmlspecialchars($_GET['idProjet']);
        require_once File:: build_path(array('view', 'view.php'));
    }
<<<<<<< HEAD

    public static function saveATask() {
        //on formate les heures en champs time
    if(isset($_POST['heure_debut'])&&isset($_POST['minute_debut'])&&isset($_POST['heure_fin'])&&isset($_POST['minute_fin'])){
        $heure_debut = $_POST['heure_debut'] . ":" . $_POST['minute_debut'];
        $heure_fin = $_POST['heure_fin'] . ":" . $_POST['minute_fin'];
        //on formate les dates
        $date_debut = Model::convertirDateBDD($_POST['date_debut']);
        $date_fin = Model::convertirDateBDD($_POST['date_fin']);
        
        $tache = new ModelTache();
        if (isset($_GET['id'])) {
		if(isset($_POST['libelle'])&&isset($_PGET['idProjet'])) {
            		$data = array(
                	'id' => $_GET['id'],
                	'libelle' => $_POST['libelle'],
                	'date_debut' => $_date_debut,
                	'date_fin' => $date_fin,
                	'heure_debut' => $heure_debut,
                	'heure_fin' => $heure_fin,
                	'id_projet' => $_GET['idProjet']
            		);
		}
		else {
			static::create();	
		}
        } else {
		if(isset($_POST['libelle'])&&isset($_PGET['idProjet'])) {
            		$data = array(
                	'libelle' => $_POST['libelle'],
                	'date_debut' => $date_debut,
                	'date_fin' => $date_fin,
                	'heure_debut' => $heure_debut,
                	'heure_fin' => $heure_debut,
                	'id_projet' => $_GET['idProjet']
            		);
		}
		else {
			static::create();
		}
        }
        var_dump($data);
        echo $tache->save($data);
	}
    }
    else {
    static::create();	
    }

}
=======
    
    public static function saveATask() {
                $tache = new ModelTache();
                if (isset($_GET['id'])){
                    $data = array(
                        'id' => $_GET['id'],
			'libelle' => $_POST['libelle'],
                        'date_debut' => $_POST['date_debut'],
			'date_fin' => $_POST['date_fin'],
                        'heure_debut' => $_POST['heure_debut'],
			'heure_fin' => $_POST['heure_fin'],
			'id_projet' => $_GET['idProjet'],
                    );
                }else {
                    $data = array(
			'libelle' => $_POST['libelle'],
                        'date_debut' => $_POST['date_debut'],
			'date_fin' => $_POST['date_fin'],
                        'heure_debut' => $_POST['heure_debut'],
			'heure_fin' => $_POST['heure_fin'],
			'id_projet' => $_GET['idProjet'],
                    );
                }
                var_dump($data);
		echo $tache->save($data);
	}
    
}

>>>>>>> d950b9d3221c3b5aefe7abe8e175fa3b5b514d0e
