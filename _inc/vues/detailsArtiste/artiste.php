<?php
echo '

<div class="container">
    <div class="informations">
        <img src="data:image/jpeg;base64,' . base64_encode($artiste[0]["image"]) . '"/>
        <div class="infos">
            <h1 class="type">' . $type . '</h1>
            <h2 class="titre">' . $artiste[0]["name"] . '</h2>
        </div>
    </div>
    <div class="musique">
    ';
    foreach($musiques as $musique){
        $note = $dl->getNoteFromMusique($musique['id']);
        echo '
            <div class="musique-container">
                <img class="img-pos" src="data:image/jpeg;base64,' . base64_encode($musique["image"]) . '"/>
                <div class="infosMusique">
                    <div class="InfoPrimaire">
                        <p class="titre">' . $musique["title"] . '</p>
                        <p class="date">' . $musique["release_date"] . '</p>
                    </div>
                    <div class="InfoSecondaire">
                        <img class="coeur" src="./_inc/static/images/coeur_vide.png" alt="coeur">
                        <p class="note">' . $note . '/5</p>
                    </div>
                </div>    
            </div>
        ';
    }
    echo '
    </div>
    <div class="album">
    ';
    foreach($albums as $album){
        echo '
            <div class="album-container">
                <img class="img-pos" src="data:image/jpeg;base64,' . base64_encode($album['image']) . '"/>
                <div class="infoAlbums">
                    <div class="InfoPrimaire">
                        <p class="titre">' . $album["title"] . '</p>
                    </div>
                </div>
            </div>
        ';
    }
    echo '
    </div>
</div>

';

?>

<link rel="stylesheet" href="./_inc/static/css/details.css">