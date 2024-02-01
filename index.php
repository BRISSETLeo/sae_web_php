<?php

require './config.php';

use classes\Template;
$template = new Template('./_inc/templates/template.php');

if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action'])){

    $action = $_GET['action'];

    if($action === 'connexion'){
        $template->render("./vues/connexion.php");
        return;
    }else if($action === 'deconnexion'){
        $_SESSION['pseudo'] = null;
        header('Location: index.php');
        exit;
    }

}

$template->render("./vues/accueil.php");

?>
