<?php

require './loader.php';

use classes\DataLoaderSQLite;

$dataLoaderSQLite = new DataLoaderSQLite();
$bestAlbums = $dataLoaderSQLite->getBestAlbums();

$response = array();

foreach ($bestAlbums as $album) {
    $response[$album['id_album']] = array(
        'id_album' => $album['id_album'],
        'album_name' => $album['album_name'],
        'image_album' => base64_encode($album['image_album']),
        'average_note' => $album['average_note'],
        'artists' => $album['artists']
    );
}

$json_response = json_encode($response);

if ($json_response === false) {
    $json_response = json_encode(["error" => json_last_error_msg()]);
}

echo $json_response;