<?php

require 'loader.php';

use classes\DataLoaderSQLite;
$dataLoaderSQLite = new DataLoaderSQLite();

$user = $dataLoaderSQLite->isUser($_POST['pseudo'], $_POST['password']);

if($user === null || $user === false){
    echo json_encode(array("success" => false, "message" => "Nom d'utilisateur ou mot de passe incorrect."));
    exit;
}

$_SESSION['pseudo'] = $_POST['pseudo'];

echo json_encode(array("success" => true));