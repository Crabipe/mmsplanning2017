<?php session_start();
	if(!isset($_SESSION['logged_in'])) {
		$_SESSION['logged_in'] = false;
		echo '<link href="css/header.css" rel="stylesheet">';
	}else if($_SESSION['logged_in'] == true) {
		header("Location: index2.php");
	}
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>GENEAWEB - Accueil</title>
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
	<link href="bootstrap/css/bootstrap-theme.css" rel="stylesheet">
    <link href="css/pageConnexion.css" rel="stylesheet">
	<link href="css/general.css" rel="stylesheet">
	<link href="font-awesome-4.6.3/css/font-awesome.min.css" rel="stylesheet">
	<?php
		if($_SESSION['logged_in'] == false) {
			echo '<link href="css/header.css" rel="stylesheet">';
		}
	?>
  </head>

 <body>
	<?php 
		include "fonction/f_connectBD.php";
		include "fonction/f_donnee.php";
		include "fonction/f_connexion.php"
	?>
	<script src="js/pageConnexion.js"></script>
	<?php 
		$PDO=fconnectBD();
		
		if(isset($_POST["dt"])) {
			if(ConnectValide($_POST["dt"], $_POST["ar"], $PDO) != -1) {
				$_SESSION['logged_in'] = true;
				header("Location: index2.php");
			}else {
				echo "<script language='Javascript'>compteInvalide()</script>";
			}
		}
	?>
	
	<section class="corps container">
		<section class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 separateur"></div>

				<div class="col-lg-4 col-md-3 col-sm-3 col-xs-1 separateur"></div>
					<div class="col-lg-4 col-md-6 col-sm-6 col-xs-10 zoneConnect">
						<form action="index.php" method="POST">
							<h1 class="title">Connectez-vous ...</h1><br/>
							<p class="connex">Identifiant : <input type="text" 	id="iden" name="dt"><br/></p>
							<p class="connex">Mot de passe : <input type="password" id="passwd" name="ar"></p>
							<div class="row">
								<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"></div>
								<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
									<input Type="submit" value="Se connecter" class="btn_connecter" name="connection">
								</div>
								<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"></div>
							</div>
						</form>
					</div>
				<div class="col-lg-4 col-md-3 col-sm-3 col-xs-1 separateur"></div>
		</section>
	</section>
		
	<script src="js/pageConnexion.js"></script>
  </body>
</html>