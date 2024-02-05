<?php

require './loader.php';

use classes\DataLoaderSQLite;
$dataLoaderSQLite = new DataLoaderSQLite();
$albums = $dataLoaderSQLite->getAlbums();

$response = array('albums' => array_map('convertAlbum', $albums));

function convertAlbum($album) {
    return array(
        'id' => $album['id_album'],
        'name' => $album['name'],
        'image' => $album['image_album']
    );
}

header('Content-Type: application/json; charset=utf-8');
echo json_encode($response);
