<!--Affichage d'un message lors de la connexion d'une personne-->

<?php

$pseudo = htmlspecialchars($tab_client->get('pseudo'));

echo <<< EOT
    <div class="container contenu">
        <p> Bienvenue <b>$pseudo</b> </p>
   </div>
     
EOT;
