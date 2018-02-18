<?php

class ControllerView {
    /*
     * Affiche le menu et l'adapte en fonction de 
     * l'utilisateur (si c'est un admin ou non)
     */

    public static function afficheMenu() {
        return ' <div class="row en-tete">
                <div class="col-md-4">
                    <a href="index.php"><img src="images/logo.gif" alt="logo"/></a>
                </div>
                <div class="col-md-offset-4 col-md-4">
                    <a href="index.php?action=create&controller=utilisateur">Inscription</a>
                    <a href="index.php?action=connect&controller=utilisateur">Connexion</a>
                </div>
            </div>';
    }

    /*
     * On prépare le menu à affiche sur le site
     */

    public static function prepMenu() {
        $data['menu'] = ControllerView::afficheMenu();
        return $data;
    }

}
