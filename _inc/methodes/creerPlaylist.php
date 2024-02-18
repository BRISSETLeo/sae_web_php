<?php

if($_SERVER['REQUEST_METHOD'] !== 'POST'){
    header('Location: ../../');
    exit();
}

if(!isset($_POST['nom']) || !isset($_POST['description']) || !isset($_POST['checkbox-checked']) || !isset($_FILES['image_playlist'])){
    header('Location: ../../');
    exit();
}

if(empty($_POST['nom']) || empty($_POST['description']) || empty($_POST['checkbox-checked']) || empty($_FILES['image_playlist'])){
    header('Location: ../../');
    exit();
}

if($_FILES['image_playlist']['size'] > 1000000){
    header('Location: ../../');
    exit();
}

if($_FILES['image_playlist']['type'] !== 'image/png'){
    header('Location: ../../');
    exit();
}

$file_content = file_get_contents($_FILES['image_playlist']['tmp_name']);

require '../../loader.php';

use classes\DataLoaderSQLite;
$dl = new DataLoaderSQLite();

$dl->createPlaylist($_POST['nom'], $_POST['description'], $_POST['checkbox-checked'], $file_content);

header('Location: ../../');
exit();