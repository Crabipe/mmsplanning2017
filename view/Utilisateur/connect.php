<!--Formulaire de connexion d'un utilisateur -->

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
