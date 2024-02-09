<?php

if(!empty($songs)) echo '<h2>Les meilleures musiques :</h2>';
echo '<div id="container-principal">';
foreach($songs as $song){
    $note = $song['note'] == null ? 0 : $song['note'];
    $noteEntiere = floor($note);
    $noteVirgule = $note - $noteEntiere;
    $artistNames = implode(', ', array_column($song['artistes'], 'name'));
    echo '
        <div class="container">
            <img src="data:image/jpeg;base64,' . base64_encode($song["image"]) . '"/>
            <div class="informations">
                <p class="titre">' . $song["title"] . '</p>
                <p class="artistes">'.$artistNames.'</p>
            </div>
            <div class="informations infos">
                <div class="container-note">
                    <div class="note" id="note-'.str_replace(' ', '',$song['title']).'">
    ';
    for ($i = 1; $i <= $noteEntiere; $i++) {
        echo '<span class="star" data-rating="total">&#9733;</span>';
    }
    if ($noteVirgule > 0) {
        echo '<span class="star" data-rating="virgule">&#9733;</span>';
    }
    if($noteEntiere < 5){
        for ($i = $noteEntiere + 1 + ($noteVirgule > 0 ? 1 : 0); $i <= 5; $i++) {
            echo '<span class="star" data-rating="empty">&#9733;</span>';
        }
    }
    echo '
        </div>
            </div>
                <p class="date">' . $song["release_date"] . '</p>
            </div>
        </div>
    ';
}
echo '</div>';