<?php

$type = $_GET['type'];
$id = $_GET['id'];

use classes\DataLoaderSQLite;
$dl = new DataLoaderSQLite();

if($type === "album"){
    $album = $dl->getAlbum($id);
    $musiques = $dl->getAllMusiqueFromAlbum($id);
    $artistes = $dl->getAllArtistesFromAlbum($id);
    require "_inc/vues/detailsAlbum/album.php";
}

else if($type === "artiste"){
    $artiste = $dl->getArtiste($id);
    echo '<img src="data:image/jpeg;base64,' . base64_encode($artiste[0]["image"]) . '"/>';
}

else if($type === "musique"){
    $musique = $dl->getMusique($id);
    echo '<img src="data:image/jpeg;base64,' . base64_encode($musique[0]["image"]) . '"/>';
}

?>
