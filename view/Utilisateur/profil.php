<!--Affichage des informations détaillées d'un utilisateur-->

<?php
$pseudo=  htmlspecialchars($profil->get('pseudo'));
$nom = htmlspecialchars($profil -> get('nom'));
$prenom = htmlspecialchars($profil -> get('prenom'));
$mail = htmlspecialchars($profil -> get('mail'));

echo <<< EOT
<div class=" col-lg-offset-4 col-md-4 blanc">
    <h1>$pseudo</h1>
    <div> <strong>Nom</strong> : $nom </div>
    <div> <strong>Prénom</strong> : $prenom </div>
    <div> <strong>Mail</strong> : $mail </div>
</div>
EOT;

