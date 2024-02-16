<?php

echo '

<div class="container">
    <div class="informations">
        <img src="data:image/jpeg;base64,' . base64_encode($playlist[0]["image"]) . '"/>
        <div class="infos">
            <h1 class="type">' . $type . '</h1>
            <h2 class="titre">' . $playlist[0]["name"] . '</h2>
            <h3 class="owner">' . $playlist[0]["owner"] . '</h3>
        </div>
    </div>
    <div class="musique">
    ';
    foreach($musiques as $musique){
        $artistNames = implode(', ', array_column($musique['artistes'], 'name'));
        $note = $dl->getNoteFromMusique($musique['id']);
        echo '
            <div class="musique-container">
                <img src="data:image/jpeg;base64,' . base64_encode($musique["image"]) . '"/>
                <div class="infosMusique">
                    <p class="titre">' . $musique["title"] . '</p>
                    <p class="artiste">' . $artistNames . '</p>
                    <p class="date">' . $musique["release_date"] . '</p>
                    <p class="note">' . $note . '/5</p>
                    <img class="coeur" src="./_inc/static/images/coeur_vide.png" alt="coeur">
                </div>
            </div>
        ';
    }
    echo '
    <div class="artistes">
    ';
    foreach($artistes as $artiste){
        echo '
            <div class="artiste-container">
            <img src="data:image/jpeg;base64,' . base64_encode($artiste['image']) . '"/>
            <div class="infosArtiste">
                    <p class="nom">' . $artiste["name"] . '</p>
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