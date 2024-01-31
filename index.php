<?php

<<<<<<< HEAD
require_once './config.php';
$template->render("./_inc/templates/accueil.php");

?>
=======
session_start();

require_once('./config.php');

use classes\Template;

$template = new Template('./_inc/templates/template.php');

if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action'])){

    $action = $_GET['action'];

    if($action === 'connexion'){
        $template->render("./vues/connexion.php");
        return;
    }else if($action === 'deconnexion'){
        session_destroy();
    }

}

$template->render("./vues/accueil.php");

?>
>>>>>>> b6b07c8 (pr)
