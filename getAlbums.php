<?php

require './loader.php';

use classes\DataLoaderSQLite;
$dataLoaderSQLite = new DataLoaderSQLite();
$albums = $dataLoaderSQLite->getAlbums();

$reponse = array();

for ($i = 0; $i < count($albums); $i++) {
    $reponse[$albums[$i]['id_album']] = array($albums[$i]['id_album'], $albums[$i]['name'], base64_encode($albums[$i]['image_album']));
}

$json_reponse = json_encode($reponse);

if($json_reponse === false){
    $json_reponse = json_encode(["error" => json_last_error_msg()]);
}

header('Content-Type: application/json');
echo $json_reponse;