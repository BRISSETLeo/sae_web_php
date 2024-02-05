<?php

use classes\DataLoaderSQLite;
$dataLoaderSQLite = new DataLoaderSQLite();

$id_album = $_GET['id'];
$album = $dataLoaderSQLite->getAlbum($id_album);

if(empty($album)){
    header('Location: ./');
    exit;
}

echo '<img src="data:image/jpeg;base64,'. base64_encode($album["image_album"]) .'" alt="${album.name}">';
echo '<p>' . $album['name'] . '</p>';

$musiqueAlbum = $dataLoaderSQLite->getMusiqueAlbum($id_album);

if(!empty($musiqueAlbum)){
    echo '<ul>';
    foreach($musiqueAlbum as $musique){
        echo '<li>' . $musique['name'] . '</li>';
    }
    echo '</ul>';
} else {
    echo '<p>Il n\'y a pas de musique dans cet album</p>';
}


?>

<link rel="stylesheet" href="static/css/album.css">