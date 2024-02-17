<?php

if(!empty($albums)) echo '<h2>Les meilleurs albums :</h2>';
echo '<div id="container-principal">';
foreach($albums as $album){
    $note = $album['note'] === null ? 0 : $album['note'];
    $noteEntiere = floor($note);
    $noteVirgule = $note - $noteEntiere;
    $artistNames = implode(', ', array_column($album['artistes'], 'name'));
    echo '
        <a class="lien_details" href="?page=details&type=album&id='.$album['id'].'">
            <div class="container">
                <img src="data:image/jpeg;base64,' . base64_encode($album["image"]) . '"/>
                <div class="informations">
                    <p class="titre">' . $album["title"] . '</p>
                    <p class="artistes">'.$artistNames.'</p>
                </div>
                <div class="informations infos">
                    <div class="container-note">
                        <div class="note" id="note-'.str_replace(' ', '',$album['title']).'">
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
                    <p class="date">.</p>
                </div>
            </div>
        </a>
    ';
}
echo '</div>';