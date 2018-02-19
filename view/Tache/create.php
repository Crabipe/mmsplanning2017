<!--Formulaire de création d'une nouvelle tâche sur un projet-->

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
			<form method="post" action="index.php?action=saveATask&controller=tache&idProjet=<?php echo $idProjet; ?>">
				<fieldset>
					<legend>Ajout d'une tâche</legend>
					<div class="container">
						<div class="form-group row">
							<label class="col-md-2 control-label" for="libelle">Nom de la tâche</label>
							<div class="col-md-3">
								<input id="libelle" name="libelle" type="text" placeholder="Nom de la tâche" class="form-control input-md" required=""/>
							</div>
						</div>
                                                <div class="form-group row">
							<label class="control-label col-md-2" for="date_debut">Date de début</label>
							<div class="col-md-3">
								<input id="date_debut" name="date_debut" type="text" placeholder="aaaa-mm-jj" class="form-control input-md" required=""/>
							</div>
						</div>
						<div class="form-group row">
							<label class="control-label col-md-2" for="date_fin">Date de fin</label>
							<div class="col-md-3">
								<input id="date_fin" name="date_fin" type="text" placeholder="aaaa-mm-jj" class="form-control input-md" required=""/>
							</div>
						</div>
						<div class="form-group row">
							<label class="control-label col-md-2" for="heure_debut">Heure de début</label>
							<div class="col-md-3">
								<input id="heure_debut" name="heure_debut" type="text" placeholder="hh:mm" class="form-control input-md" required=""/>
							</div>
						</div>
						<div class="form-group row">
							<label class="control-label col-md-2" for="heure_fin">Heure de fin</label>
							<div class="col-md-3">
								<input id="heure_fin" name="heure_fin" type="text" placeholder="hh:mm" class="form-control input-md" required=""/>
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
