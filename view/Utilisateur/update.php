<!--Affichage d'un formulaire de mise à jour d'un profil utilisateur-->

<form method="post" action="index.php?action=updated&controller=utilisateur&idUtilisateur=<?php echo $idUtilisateur; ?>">
    <fieldset>
        <legend>Modification</legend>
        <div class="form-group row">
            <label class="col-md-2 control-label" for="nom">Nom</label>
            <div class="col-md-2">
                <input id="nom" name="nom" type="text" class="form-control input-md" required=""/>
            </div>
        </div>
        <div class="form-group row">
            <label class="control-label col-md-2" for="prenom">Prénom</label>
            <div class="col-md-2">
                <input id="prenom" name="prenom" type="text" class="form-control input-md" required=""/>
            </div>
        </div>
        <div class="form-group row">
            <label class="control-label col-md-2" for="mail">Mail</label>
            <div class="col-md-2">
                <input id="mail" name="mail" type="text" class="form-control input-md" required=""/>
            </div>
        </div>
        <!--Pour l'administrateur, possibilité de donner les droits 
        d'administration à l'utilisateur -->
        <?php
        if (ControllerSession::is_admin()){
            echo <<<EOT
            <div class="form-group row">
            <label class="control-label col-md-2" for="admin">Administrateur</label>
            <div class="col-md-2">
                <label for="admin">Oui</label>
                <input type="checkbox" name="admin" value="1">
                <label for="pasadmin">Non</label>
                <input type="checkbox" name="pasadmin" value="2">
            </div>
        </div>
EOT;
        }
        ?>
        <p class="form-group">
            <input class="btn btn-lg btn-success form-control" type="submit" value="Envoyer" />
        </p>
    </fieldset>
</form>
