<?php

require 'loader.php';

$file_template = '_inc/templates/accueil.php';
$file_content = 'vues/accueil.php';

if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action'])){

    $action = $_GET['action'];

    if($action === 'deconnexion'){
        $_SESSION['pseudo'] = null;
        header('Location: ./');
        exit;
    } else if($action === 'connexion'){
        $file_template = '_inc/templates/identification.php';
        $file_content = 'vues/connexion.php';
    } else if($action === 'inscription'){
        $file_template = '_inc/templates/identification.php';
        $file_content = 'vues/inscription.php';
    } else if($action === 'album'){
        $id_album = $_GET['id'];
        $file_content = 'vues/album.php';
    }

}

$template->setPath($file_template);
$template->render($file_content);
