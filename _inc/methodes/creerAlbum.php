<?php

if($_SERVER['REQUEST_METHOD'] !== 'POST'){
    header('Location: ../../');
    exit();
}

if(!isset($_POST['nom']) || !isset($_FILES['fichier'])){
    header('Location: ../../');
    exit();
}

if(empty($_POST['nom']) || empty($_FILES['fichier'])){
    header('Location: ../../');
    exit();
}

if($_FILES['fichier']['size'] > 1000000){
    header('Location: ../../');
    exit();
}

if($_FILES['fichier']['type'] !== 'image/png'){
    header('Location: ../../');
    exit();
}

$file_content = file_get_contents($_FILES['fichier']['tmp_name']);

require '../../loader.php';

use classes\DataLoaderSQLite;
$dl = new DataLoaderSQLite();

$dl->createAlbum($_POST['nom'], $file_content);

header('Location: ../../');
exit();