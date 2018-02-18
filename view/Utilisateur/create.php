<!--Formulaire de création d'un utilisateur
Seules les informations pour le compte sont demandées, le profil n'est pas li�
aux différentes fiches des personnes-->

<div class="container contenu">
    <form method="post" action="index.php?action=created&controller=utilisateur">
        <fieldset>
            <legend>Inscription</legend>
            <div class="form-group row">
                <label class="control-label col-md-2" for="nom">Nom</label>
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
                <label class="control-label col-md-2" for="adresse">Adresse</label>
                <div class="col-md-2">
                    <input id="adresse" name="adresse" type="text" class="form-control input-md" required=""/>
                </div>
            </div>
            <div class="form-group row">
                <label class="control-label col-md-2" for="telephone">Téléphone</label>
                <div class="col-md-2">
                    <input id="telephone" name="telephone" type="text" class="form-control input-md" required=""/>
                </div>
            </div>
            <div class="form-group row">
                <label class="control-label col-md-2" for="email">Email</label>
                <div class="col-md-2">
                    <input id="email" name="email" type="text" class="form-control input-md" required=""/>
                </div>
            </div>
            <div class="form-group row">
                <label class="control-label col-md-2" for="login">Compétences</label>
                <div class="col-md-2">
                    <input id="competences" name="competences" type="text" class="form-control input-md" required=""/>
                </div>
            </div>
            <div class="form-group row">
                <label class="control-label col-md-2" for="login">Login</label>
                <div class="col-md-2">
                    <input id="login" name="login" type="text" class="form-control input-md" required=""/>
                </div>
            </div>
            <div class="form-group row">
                <label class="control-label col-md-2" for="mdp">Mot de passe</label>
                <div class="col-md-2">
                    <input id="mdp" name="mdp" type="password" placeholder="*********" class="form-control input-md" required=""/>
                </div>
            </div>
            <div class="form-group row">
                <label class="control-label col-md-2" for="confirmerMDP">Confirmer le mot de passe</label>
                <div class="col-md-2">
                    <input id="confirmerMDP" name="confirmerMDP" type="password" placeholder="*********" class="form-control input-md" required=""/>
                </div>
            </div>
            <p class="form-group">
                <input class="btn btn-lg btn-success form-control" type="submit" value="Envoyer" />
            </p>
        </fieldset>
    </form>
</div>