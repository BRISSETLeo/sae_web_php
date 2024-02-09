<?php

?>

<div id="container-search">
    <input type="text" id="search" placeholder="Recherche...">
    <div id="filtre">
        <div id="container-all">
            <input id="all" type="radio" name="filter" value="all" checked>
            <label for="all" id="tout">Tout</label>
        </div>
        
        <div id="container-albums">
            <input id="albums" type="radio" name="filter" value="albums">
            <label for="albums" id="album">Albums</label>
        </div>

        <div id="container-musiques">
            <input id="musiques" type="radio" name="filter" value="musiques">
            <label for="musiques" id="song">Musiques</label>
        </div>

        <div id="container-artistes">
            <input id="artistes" type="radio" name="filter" value="artistes">
            <label for="artistes" id="artiste">Artistes</label>
        </div>
    </div>
</div>