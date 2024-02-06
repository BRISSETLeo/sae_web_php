<?php

require './loader.php';

use classes\DataLoaderSQLite;

$dataLoaderSQLite = new DataLoaderSQLite();
$bestAlbums = $dataLoaderSQLite->getBestMusiques();

$response = array();

foreach ($bestAlbums as $album) {
    $response[$album['id_song']] = array(
        'id_song' => $album['id_song'],
        'song_name' => $album['song_name'],
        'image_song' => $album['image_song'],
        'average_note' => $album['average_note']
    );
}

$json_response = json_encode($response);

if ($json_response === false) {
    $json_response = json_encode(["error" => json_last_error_msg()]);
}

echo $json_response;