<?php

if($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../..');
    exit();
}

require '../../loader.php';

use classes\DataLoaderSQLite;

$userNameSet = isset($_POST['username']) ? !empty(trim($_POST['username'])) : false;
$passwordSet = isset($_POST['password']) ? !empty(trim($_POST['password'])) : false;

if($userNameSet && $passwordSet) {
    $nom = $_POST['username'];
    $mdp = $_POST['password'];

    $dl = new DataLoaderSQLite();
    $res = $dl->insertUser($nom, $mdp);

    if($res) {
        $_SESSION['user'] = $nom;
    }

    echo json_encode(array('success' => $res, 'message' => ($res ? 'Utilisateur inscrit' : 'Ce nom d\'utilisateur est déjà utilisé')));
} else {
    echo json_encode(array('success' => false, 'message' => 'Nom d\'utilisateur ou mot de passe manquant'));
}

exit();