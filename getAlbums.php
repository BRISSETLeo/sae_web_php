<?php
require_once './config.php';

global $pdo;
$albums = $pdo->getAlbums();

// Ajoutez cette ligne pour correspondre à la structure attendue par le script JavaScript
$response = array('albums' => array_map('convertAlbum', $albums));

// Fonction pour convertir le format des albums (ajustez-la selon votre structure d'album réelle)
function convertAlbum($album) {
    $imageData = $album['image_album'];
    return array(
        'titre' => $album['titre'],
        'description' => $album['description'],
        'note' => $album['note'],
        'imageBlob' => $imageData,
    );
}

// Encodez les données en JSON et renvoyez-les
header('Content-Type: application/json');
echo json_encode($response);
?>
