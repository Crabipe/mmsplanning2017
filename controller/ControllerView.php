<?php
require_once File::build_path(array('controller', 'ControllerSession.php'));

class ControllerView {

    /*
     * Affiche le menu et l'adapte en fonction de 
     * l'utilisateur (si c'est un admin ou non)
     */
    public static function afficheMenu() {
        if (ControllerSession::is_admin()) {
                        return '<nav>
                <div class="menu_principal">
                    <div class="container">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="index.php">Geneaweb ADMIN</a>
                        </div>
                            <div id="navbar" class="collapse navbar-collapse"">
                                <ul class="nav navbar-nav">
                                    <li><a href="index.php?action=readAll&controller=arbre">Mes Arbres</a>
                                    <li><a href="index.php?action=readAll&controller=personne">Mes fiches</a></li>
                                    <li><a href="index.php?action=readAll&controller=utilisateur">Utilisateurs</a></li>
                                    <li class="deconnexion"><a href="index.php?action=deconnect&controller=utilisateur">Déconnexion</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="menu_responsive">
                        <img class="menu_burger" src="./images/menu_burger.png" alt="burger"/>
                        <div class="menu_responsive_liens">
                            <div><a href="index.php?action=readAll&controller=arbre">Mes Arbres</a></div>
                            <div><a href="index.php?action=readAll&controller=personne">Mes fiches</a></div>
                            <div><a href="index.php?action=readAll&controller=utilisateur">Utilisateurs</a></div>
                            <div class="deconnexion"><a href="index.php?action=deconnect&controller=utilisateur">Déconnexion</a></div>
                        </div>
                    </div>
                </div>';
        }else if (ControllerSession::is_user()){
                        return '<nav>
                <div class="menu_principal">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="index.php">Geneaweb</a>
                    </div>
                        <div id="navbar" class="collapse navbar-collapse"">
                            <ul class="nav navbar-nav">
                                <li><a href="index.php?action=readAll&controller=arbre">Mes Arbres</a></li>
                                <li><a href="index.php?action=readAll&controller=personne">Mes fiches</a></li>
                                <li><a href="index.php?action=read&controller=utilisateur">Mon Profil</a></li>
                                <li><a href="index.php?action=deconnect&controller=utilisateur"><span class="deconnexion">Déconnexion</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                    <div class="menu_responsive">
                        <img class="menu_burger" src="./images/menu_burger.png" alt="burger"/>
                        <div class="menu_responsive_liens">
                            <div><a href="index.php?action=readAll&controller=arbre">Mes Arbres</a></div>
                            <div><a href="index.php?action=readAll&controller=personne">Mes fiches</a></div>
                            <div><a href="index.php?action=read&controller=utilisateur">Mon profil</a></div>
                            <div class="deconnexion"><a href="index.php?action=deconnect&controller=utilisateur">Déconnexion</a></div>
                        </div>
                    </div>';
        } else {
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
    }

    /*
     * On prépare le menu à affiche sur le site
     */
    public static function prepMenu() {
        $data['menu'] = ControllerView::afficheMenu();
        return $data;
    }

}
