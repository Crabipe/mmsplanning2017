<!--Affichage des erreurs importantes
Pour afficher les erreurs on utilise une structure de page identique aux autres
pages mais on affiche simplement une erreur, retournée par une des fonctions php
-->
<!DOCTYPE html>
<?php require_once File::build_path(array('controller', 'ControllerView.php'));
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Geneaweb</title>
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="bootstrap/css/style.css" rel="stylesheet">
        <link rel="shortcut icon" href="images/icone.ico" />
    </head>

    <header class="container">
        <!-- Affichage du menu après vérification de connexion -->
        <?php echo ControllerView::afficheMenu(); ?>
    </header>
    <body>
        <!--On récupère en php le contenu de la variable $type qui contient
        l'erreur a affiché, on affiche ensuite le message ainsi qu'un lien vers
        la page d'acceuil du site -->
    <?php
    echo "<div class='err'><p>$type</p></div>";
    echo '<a href="index.php">Retour au menu</a>';
    ?>   
</body>    
</html>
