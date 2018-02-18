<?php
	
	function fconnectBD(){
		
		$DB_NAME = "mmsplannsh2017";
		$DB_HOST = "localhost";
		$DB_USER = "root";
		$DB_PASS = "root";
		
		$PDO = new PDO("mysql:host=$DB_HOST; dbname=$DB_NAME; charset=utf8", $DB_USER, $DB_PASS);	
		
		return $PDO;
	}

?>