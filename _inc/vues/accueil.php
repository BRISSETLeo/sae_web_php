<?php

use classes\DataLoaderSQLite;

$dl = new DataLoaderSQLite();
$songs = $dl->getAllSongswithNote();
$albums = $dl->getAllAlbumsWithNote();

?>

<form action="./_inc/methodes/creerPlaylist.php" method="POST" enctype="multipart/form-data">
    <div id="container-playlist">
        <div id="playlist">
            <button type="submit" id="sauvegarder-playlist">Créer la playlist</button>
            <div id="playlist-title">
                <div>
                    <div id="image_pl">
                        <input type="file" id="image_playlist" name="image_playlist"/>
                        <img id="image_playlist_preview" src="_inc/static/img/playlist.png" alt=""/>
                        <p id="message_playlist">
                            Choisir une image
                        </p>
                    </div>
                </div>
                <script src="_inc/static/js/choiseImageInput.js"></script>
                <div id="visibilite">
                    <input type="text" id="nom-playlist" name="nom" placeholder="Nom de la playlist"/>
                    <div id="visibilite-playlist">
                        <label id="form-control">
                            <input id="public" type="checkbox" name="checkbox-checked"/> Publique
                        </label>
                    </div>
                </div>
            </div>
            <textarea id="description-playlist" name="description" placeholder="Description de la playlist" rows="12"></textarea>
        </div>
        <h1>Playlist</h1>
    </div>
</form>

<div id="container">
    <?php require '_inc/vues/affichageAccueil/recherche.php'; ?>
    <div id="container-accueil">
        <?php
            require '_inc/vues/affichageAccueil/bestAlbum.php';
            require '_inc/vues/affichageAccueil/bestSong.php';
        ?>
    </div>
</div>
<div id="research-container"></div>

<link rel="stylesheet" href="_inc/static/css/accueil.css">