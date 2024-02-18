<div id="playlist-list" class="default-playlist-list">
    <div id="flex-position">
        <div>
            <img id="playlist-logo" onclick="retrecir()" src="_inc/static/images/playlist.png" alt="Playlist logo"/>
            <p class="repositionnement">Playlist</p>
        </div>
        <div id="resizable">
            <img id="ajout-playlist" onclick="afficherCreationPlaylist()" src="_inc/static/images/plus.png" alt="Ajouter une playlist"/>
            <img id="chevron" onclick="resizePlaylist()" src="_inc/static/images/next.png" alt="right chevron"/>
        </div>
    </div>
    <div id="contre-playlist">
        <?php

        use classes\DataLoaderSQLite;

        if(isset($_SESSION['user'])){
            $dl = new DataLoaderSQLite();
            $playlists = $dl->getAllMyPlaylist($_SESSION['user']);
            foreach ($playlists as $key => $value){
                $playlist = $playlists[$key];
                if($playlist["image"] !== null){
                    $playlist["image"] = base64_encode($playlist["image"]);
                    $playlist["4"] = base64_encode($playlist["4"]);
                }
                echo '
                    <div class="cliquable">
                        <a href="?page=details&type=playlist&id='.$playlist["id"].'">'.$playlist["name"].'</a>
                    </div>
                ';
            }
        }

        ?>
    </div>
</div>

<link rel="stylesheet" href="_inc/static/css/playlist.css">
<script src="_inc/static/js/resizePlaylist.js"></script>