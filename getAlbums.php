<?php

require './config.php';

use classes\DataLoaderSQLite;
$dataLoaderSQLite = new DataLoaderSQLite();
$albums = $dataLoaderSQLite->getAlbums();

$response = array('albums' => array_map('convertAlbum', $albums));

function convertAlbum($album) {
    $imageData = $album['image_album'];
    return array(
        'titre' => $album['titre'],
        'description' => $album['description'],
        'note' => $album['note'],
        'imageBlob' => $imageData,
    );
}

$response = array('success' => true, 'albums' => 'albums');
header('Content-Type: application/json');
echo json_encode($response);

?>
