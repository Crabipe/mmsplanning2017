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

    /**
     * Enregistrement d'un élément dans la base de données 
     * (insertion ou modification)
     * @param type $record liste des éléments à enregistrer
     */
    public static function save($record) {
        $table_name = static::$object;

        if(isset($record['id'])){
            ModelProjet::update($record);
        } else {
            ModelProjet::insert($record);
        }
    }


    /**
     * Supression d'un élément de la base de données
     * @param type $id
     * @return string
     */
    public static function delete($id) {
        $id = preg_replace("/[^0-9]/si", "", $id);
        mysql_query("delete from Projet where id='$id'");

        if ($_POST['json']) {
            $ret = array(
                'success' => true
            );
            return json_encode($ret, true);
        } else {
            return "OK";
        }
    }

    /* transformation d'une date en objet XML */

    public static function getEventsOfAWeekAsXML($an, $mois, $jour) {
        $events = $this->getEventsOfAWeek($an, $mois, $jour);
        return $this->toXML($items);
    }

    /* Conversion en XML */

    private static function toXML($items) {

        $ret = '<?xml version="1.0" ?>';
        foreach ($items as $item) {
            $ret .= '<item>
                <id>' . $item['id'] . '</id>
                <nom>' . $item['nom'] . '</nom>
                <adresse>' . $item['adresse'] . '</adresse>
		<commentaire>' . $item['commentaire'] . '</commentaire>
                <date_debut>' . $item['date_debut'] . '</date_debut>
                <date_fin>' . $item['date_fin'] . '</date_fin>
                <etat>' . $item['etat'] . '</etat>
            </item>';
        }
        return $ret;
    }

    /* Conversion en élément JSON */

    public static function getEventsOfAWeekAsJSON($an, $mois, $jour) {
        $events = $this->getEventsOfAWeek($an, $mois, $jour);
        $jsonArray = array(
            'success' => true,
            'data' => $events
        );
        return json_encode($jsonArray, true);
    }

    /* Tous les éléments d'une semaine */

    private static function getEventsOfAWeek($an, $mois, $jour) {
        $ret = array();
        /* on crée le timestamp pour la date de début et celle de fin */
        $tsStart = mktime(0, 0, 0, $mois, $jour, $an);
        ;
        $tsEnd = $tsStart + $this->getSecondsInAWeek();

        /* date de début et de fin de cette semaine */
        $date_debut = date("Y-m-d H:i:s", $tsStart);
        $date_fin = date("Y-m-d H:i:s", $tsEnd);

        $res = mysql_query("select * from Projet where date_debut>='$date_debut' && date_fin<'$date_fin'");
        while ($row = mysql_fetch_array($res)) {
            $tsStart = strtotime($row['date_debut']);
            $tsEnd = strtotime($row['date_fin']);
            $ret[] = array(
                'id' => $row['ID'],
                'adresse' => $row['adresse'],
                'commentaire' => $row['commentaire'],
                'date_debut' => strftime('%a, %d %b  %Y %H:%M GMT+2', $tsStart), // TIMEZONE ON THE SERVER
                'date_fin' => strftime('%a, %d %b %Y %H:%M GMT+2', $tsEnd), // TIMEZONE ON THE SERVER
                'etat' => $row['etat']
            );
        }
        return $ret;
    }

    private static function getSecondsInAWeek() {
        return 7 * 60 * 60 * 24;
    }

}

?>
