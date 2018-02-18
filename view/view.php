<!--Page générale du site
elle sera appellée à chaque action afin d'afficher le contenu de la page.
Cette page est renouvellée sans cesse, elle contient la structure commune à
toutes les pages du site.
L'affichage du contenu de la page sera une complétion dans le <body> de cette page
Le menu du site changera en fonction de la connection des utilisateurs et des
droits, il sera donc affiché après une requete PHP également -->

<?php require_once File::build_path(array('controller', 'ControllerView.php'));
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Geneaweb</title>
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="bootstrap/css/style.css" rel="stylesheet">
        <link rel="shortcut icon" href="images/icone.ico" />
    </head>

    <header class="container">
        <!--Menu du site -->
        <?php echo ControllerView::afficheMenu(); ?>
    </header>
    <body>
        <!--corps de toutes les pages du site (structure commune) -->
        <?php
        $filepath = File::build_path(array('view', static::$object, $view . '.php'));
        require $filepath;
        ?>    
    </body>    
</html>

