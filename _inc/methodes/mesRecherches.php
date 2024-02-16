<?php



require '../../loader.php';

use classes\DataLoaderSQLite;
$dl = new DataLoaderSQLite();

if(!isset($_POST['recherche'])){
    $_POST['recherche'] = 'l';
}

$recherche = $_POST['recherche'];

require './sous-methodes/recherchePlaylist.php';
$lesPlaylistByName = $dl->getPlaylistByName($recherche);
$lesPlaylistByOwner = $dl->getPlaylistByOwner($recherche);

require './sous-methodes/rechercheAlbum.php';
$lesAlbumsByTitle = $dl->getAlbumByTitle($recherche);
$lesAlbumsByBand = $dl->getAlbumByBand($recherche);

require './sous-methodes/rechercheSong.php';
$lesSongsByTitle = $dl->getSongByTitle($recherche);
$lesSongsByBand = $dl->getSongByBand($recherche);

require './sous-methodes/rechercheBand.php';
$lesArtistesByName = $dl->getArtisteByName($recherche);

echo json_encode(array("success" => true, "lesPlaylist" => playlistToJson($lesPlaylistByName, $lesPlaylistByOwner), 
"lesAlbums" => albumToJson($lesAlbumsByTitle, $lesAlbumsByBand), 
"lesSongs" => songToJson($lesSongsByTitle, $lesSongsByBand),
"lesArtistes" => bandToJson($lesArtistesByName)));