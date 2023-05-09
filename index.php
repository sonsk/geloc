<?php

    session_start();

    ob_start();

require_once('controllers/userController.php');
require_once('controllers/paiementController.php');
require_once('controllers/errorController.php');
require_once 'helpers/utils.php';
require_once('config/db.php');
require_once('config/parametre.php');
require_once('assets/link.php');
/* require_once('autoload.php'); */

require_once('views/layout/header.php');

//connexion à la base de donnée
$bdd=Database::connect();

function show_error()
{
    $error= new errorController;
    $error->index();
}
  //on check si le controller existe
if (isset($_GET['controller'])) {
    $controller_name = $_GET['controller'] . 'Controller';

    //control la page d'acceuil par defaut
} elseif (!isset($_GET['controller']) && !isset($_GET['action'])) {
   $controller_name=default_controller;
} else {
   show_error();
}

//on check si le controller est bien une class qui existe
if (class_exists($controller_name)) {
    //si oui on instentie la classe
    $controller= new $controller_name;

    //on check s'il y'a une action dans l'url et si cette action est bien une methode du controller
    if (isset($_GET['action'])  && method_exists($controller, $_GET['action'])) {
        $action=$_GET['action'];
        $controller->$action();

        //maintenant on check si l'action n'existe pas et le controller nexiste pas
        //alors on charge la methode par defaut du controller par defaut
        //ceci fera office de chargement automatique d'une page dans tout les cas
    }elseif (!isset($_GET['controller']) && !isset($_GET['action'])) {
        $default= default_action;
        $controller->$default();
    }else {
        show_error();
    }
}else{
    show_error();
}
require_once('assets/link-js.php');
require_once('views/layout/footer.php');
