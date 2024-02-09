<?php

use classes\DataLoaderSQLite;

$dl = new DataLoaderSQLite();
$songs = $dl->getAllSongswithNote();
$albums = $dl->getAllAlbumsWithNote();

echo '<div id="container-playlist">
    <div id="playlist">
        <button id="sauvegarder-playlist">Sauvegarder</button>
        <div id="playlist-title">
            <img src="_inc/data/mesDonnees/Le_Meilleur_Des_Années_80.jpg" alt="image" id="image-playlist"/>
            <div id="visibilite">
                <input type="text" id="nom-playlist" placeholder="Nom de la playlist"/>
                <div id="visibilite-playlist">
                    <label id="form-control">
                        <input id="public" type="checkbox" name="checkbox-checked"/> Publique
                    </label>
                </div>
            </div>
        </div>
        <textarea id="description-playlist" placeholder="Description de la playlist" rows="12"></textarea>
    </div>
    <h1>Playlist</h1>
</div>';

require '_inc/vues/affichageAccueil/recherche.php';
echo '<div id="container-accueil">';
    require '_inc/vues/affichageAccueil/bestAlbum.php';
    require '_inc/vues/affichageAccueil/bestSong.php';
echo '</div>';

?>

<link rel="stylesheet" href="_inc/static/css/accueil.css">