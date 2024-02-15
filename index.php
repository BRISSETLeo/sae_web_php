<?php

require './loader.php';

use classes\Template;
$template = new Template('_inc/templates/default.php');

if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['page'])){
    
    $page = $_GET['page'];
    
    if($page === 'connexion'){
        $template->render('_inc/vues/connexion.php');
    }else if($page === 'inscription'){
        $template->render('_inc/vues/inscription.php');
    }else if($page === 'deconnexion'){
        unset($_SESSION['user']);
        $template->render('_inc/vues/accueil.php');
    }else if($page === "details"){
        $template->render('_inc/vues/details.php');
    }else{
        $template->render('_inc/vues/accueil.php');
    }

}else{
    $template->render('_inc/vues/accueil.php');
}
