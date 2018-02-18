<!--Formulaire html demandant la confirmation de suppression d'un utilisateur-->

<form method="post" action="index.php?action=deleted&controller=utilisateur&idUtilisateur=<?php echo $idUtilisateur; ?>">
    <fieldset>
        <legend>Suppression</legend>
        <div class="form-group row">
            <label class="col-md-2 control-label" for="confirmation">Êtes-vous sûr de vouloir supprimer votre compte ?</label>
        </div>
        <p class="form-group">
            <button name="confirmation" class="btn btn-lg btn-success form-control" value="Oui" />
            <button name="confirmation" class="btn btn-lg btn-danger form-control" value="Non" />
        </p>
    </fieldset>
</form>