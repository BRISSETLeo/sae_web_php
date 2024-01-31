<?php

<<<<<<< HEAD
require_once('./config.php');

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

header('Content-Type: application/json; charset=utf-8');
=======
$response = array('success' => true, 'albums' => 'albums');

header('Content-Type: application/json');

>>>>>>> ceff646 (pr)
echo json_encode($response);
?>
