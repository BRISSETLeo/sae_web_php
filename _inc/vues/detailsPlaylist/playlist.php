<?php

$image = ($playlist[0]["image"] !== null) ? base64_encode($playlist[0]["image"]) : null;
echo '
<div class="container">
    <div class="informations">
        <img src="data:image/jpeg;base64,' . $image . '"/>
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
        $image = ($musique["image"] !== null) ? base64_encode($musique["image"]) : null;
        echo '
            <div class="musique-container">
                <img src="data:image/jpeg;base64,' . $image . '"/>
                <div class="infosMusique">
                    <div class="InfoPrimaire">
                        <p class="titre">' . $musique["title"] . '</p>
                        <p class="artiste">' . $artistNames . '</p>
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
    <div class="artistes">
    ';
    foreach($artistes as $artiste){
        $image = ($artiste["image"] !== null) ? base64_encode($artiste["image"]) : null;
        echo '
            <div class="artiste-container">
                <img src="data:image/jpeg;base64,' . $image . '"/>
                <a class="nom" href="?page=details&type=artiste&id='.$artiste["id"].'">' . $artiste["name"] . '</a>
            </div>
        ';
    }
    echo '
    </div>
</div>

';

?>

<link rel="stylesheet" href="./_inc/static/css/details.css">