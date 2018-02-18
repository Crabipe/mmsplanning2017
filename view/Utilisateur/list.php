<!-- Affichage de la liste des utilisateurs (pour l'adminitrateur du site) -->

<?php

echo "<div class='container contenu'>";
echo "<div class='col-xs-offset-10 col-xs-2'>
            <button><a href='index.php?action=create&controller=Utilisateur'>Créer un utilisateur</a></button>
        </div>";
foreach ($tab_Utilisateur as $util) {
    $id = htmlspecialchars($util->get('id'));
    $nom = htmlspecialchars($util->get('nom'));
    $prenom = rawurlencode($util->get('prenom'));
    $login = htmlspecialchars($util->get('pseudo'));

    echo <<< EOT
    <div class=col-md-4>
        <h1><a href="index.php?action=read&controller=utilisateur&idUtilisateur=$id">$login</a></h1>
        <p>$prenom $nom </p>
EOT;
    //L'administareur peut modifier et supprimer tous les profils utilisateurs
    if (ControllerSession::is_admin()) {
        echo <<< EOT
            <button class="btn btn_orange"><a href='index.php?action=update&controller=utilisateur&idUtilisateur=$id'><span class="fa fa-pencil-square-o"></span>Modifier</a>
            <button class="btn btn_rouge"><a href='index.php?action=delete&controller=utilisateur&idUtilisateur=$id'><span class="fa fa-pencil-square-o"></span>Supprimer</a>
    </div>
EOT;
    }
}

echo"</div>";
