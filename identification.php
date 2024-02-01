<?php

require './config.php';

use classes\DataLoaderSQLite;
$pdo = new DataLoaderSQLite();

if(isset($_SESSION['pseudo'])){
    header('Location: ./index.php');
    return;
}

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    if(isset($_POST['inscription-input'])){

        $pseudo = $_POST['pseudo'];
        $password = $_POST['password'];

        $result = $pdo->insertUser($pseudo, $password);

        if($result){
            $_SESSION['pseudo'] = $pseudo;
            header('Location: ./index.php');
            return;
        }

    }else{

        $pseudo = $_POST['pseudo'];
        $password = $_POST['password'];
        
        $result = $pdo->isUser($pseudo, $password);

        echo $result;

        if($result){
            $_SESSION['pseudo'] = $pseudo;
            header('Location: ./index.php');
            return;
        }

    }

}

$template->render("./_inc/templates/identification.php");

?>