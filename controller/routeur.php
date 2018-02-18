<?php

if (isset($_GET['controller'])) {
    $controller = $_GET['controller'];
} else {
    $controller = 'produit';
}
$controller_class = 'Controller' . ucfirst($controller);

session_start();
require_once File::build_path(array('controller', 'ControllerUtilisateur.php'));
require_once File::build_path(array('controller', 'ControllerView.php'));
require_once File::build_path(array('controller', 'ControllerSecurity.php'));

/*
 * Verification que le controller existe (ne pas lever une erreur sinon)
 */
if (class_exists($controller_class)) {
    if (isset($_GET['action'])) {
        $action = $_GET['action'];
        $tab_meth = get_class_methods($controller_class);
        if (in_array($action, $tab_meth)) {
            $controller_class::$action();
        } else {
            ControllerVille::readAll();
        }
    } else {
        ControllerVille::readAll();
    }
} else {
    require_once File::build_path(array('view', 'acceuil.php'));
}
