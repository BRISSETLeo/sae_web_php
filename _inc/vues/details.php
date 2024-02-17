<?php

if(!isset($_GET['type']) || !isset($_GET['id'])){
    header("Location: ../");
    exit();
}

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
    $musiques = $dl->getAllMusiqueFromArtiste($id);
    $albums = $dl->getAllAlbumFromArtiste($id);
    require "_inc/vues/detailsArtiste/artiste.php";
}

else if($type === "playlist"){
    $playlist = $dl->getPlaylist($id);
    $musiques = $dl->getAllMusiqueFromPlaylist($id);
    $artistes = $dl->getAllTableArtisteFromPlaylist($id);
    require "_inc/vues/detailsPlaylist/playlist.php";
}
