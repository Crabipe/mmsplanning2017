<!--Page d'acceuil du site
Cette page est en html, elle comporte un formulaire de création de projet -->

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Chez Jawad</title>
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="css/planning.css" rel="stylesheet">
        <link rel="shortcut icon" href="images/icone.ico" />
    </head>

    <header class="container">
        
    </header>
    <body>
        <!--Affichage des différents élements graphiques en utilisant le
        framework Bootstrap -->
        <div class="contenu">
			<form method="post" action="index.php?action=saveAProject&controller=projet">
				<fieldset>
					<legend>Ajout d'un projet</legend>
					<div class="container">
						<div class="form-group row">
							<label class="col-md-2 control-label" for="nom">Nom du projet</label>
							<div class="col-md-3">
								<input id="nom" name="nom" type="text" placeholder="Nom du projet" class="form-control input-md" required=""/>
							</div>
						</div>
                                                <div class="form-group row">
							<label class="control-label col-md-2" for="id_chefProjet">Chef du projet</label>
							<div class="col-md-3">
								<input id="id_chefProjet" name="id_chefProjet" type="number" placeholder="1" class="form-control input-md" required=""/>
							</div>
						</div>
						<div class="form-group row">
							<label class="control-label col-md-2" for="adresse">Adresse du projet</label>
							<div class="col-md-3">
								<input id="adresse" name="adresse" type="text" placeholder="rue Gerard" class="form-control input-md" required=""/>
							</div>
						</div>
						<div class="form-group row">
							<label class="control-label col-md-2" for="commentaire">Commentaires</label>
							<div class="col-md-3">
								<input id="commentaire" name="commentaire" type="textarea" placeholder="commentaires éventuels" class="form-control input-md" required=""/>
							</div>
						</div>
						<div class="form-group row">
							<label class="control-label col-md-2" for="date_debut">Date de début</label>
							<div class="col-md-3">
								<input id="dateDebut" name="date_debut" type="text" placeholder="jj/mm/aaaa" class="form-control input-md" required=""/>
							</div>
						</div>
						<div class="form-group row">
							<label class="control-label col-md-2" for="date_fin">Date de fin</label>
							<div class="col-md-3">
								<input id="dateFin" name="date_fin" type="text" placeholder="jj/mm/aaaa" class="form-control input-md" required=""/>
							</div>
						</div>
						<div class="form-group row">
							<label class="control-label col-md-2" for="etat">Etat du projet</label>
							<div class="col-md-3">
								<input id="etat" name="etat" type="number" placeholder="1" class="form-control input-md" required=""/>
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