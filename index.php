<?php

<<<<<<< HEAD
require './config.php';
=======
session_start();

require_once('./config.php');
>>>>>>> a947e4c (re structuration de l'arborescence du code)

use classes\Template;
$template = new Template('./_inc/templates/template.php');

if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action'])){

    $action = $_GET['action'];

    if($action === 'connexion'){
        $template->render("./vues/connexion.php");
        exit;
    }else if($action === 'deconnexion'){
        session_destroy();
    }

}

$template->render("./vues/accueil.php");

?>
