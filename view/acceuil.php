<!--Page d'acceuil du site
Cette page est en html, seul le menu sera affiché en php pour différencier un
membre connecté ou non-->

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Chez Jawad</title>
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="bootstrap/css/style.css" rel="stylesheet">
        <link rel="shortcut icon" href="images/icone.ico" />
    </head>

    <header class="container">
        
    </header>
    <body>
        <!--Affichage des différents élements graphiques en utilisant le
        framework Bootstrap -->
        <div class="contenu">
			<form method="post" action="index.php?action=connected&controller=utilisateur">
				<fieldset>
					<legend>Connexion</legend>
					<div class="container">
						<div class="form-group row">
							<label class="col-md-2 control-label" for="nom">Nom d'utilisateur</label>
							<div class="col-md-3">
								<input id="nom" name="loginUser" type="text" placeholder="Nom d'utilisateur" class="form-control input-md" required=""/>
							</div>
						</div>
						<div class="form-group row">
							<label class="control-label col-md-2" for="mdp">Mot de passe</label>
							<div class="col-md-3">
								<input id="mdp" name="mdp" type="password" placeholder="*********" class="form-control input-md" required=""/>
							</div>
						</div>
						<div class="form-group row">
						<p class ="col-md-offset-2">
							<input class="btn btn-success" type="submit" value="Envoyer" />
						</p>
						</div>
					</div>
				</fieldset>
			</form>
		</div>
    </body>
</html>

