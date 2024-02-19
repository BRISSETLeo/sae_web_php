<?php

$listeArtiste= array();

echo '

<div class="container">
    <div class="informations">
        <img src="data:image/jpeg;base64,' . base64_encode($album[0]["image"]) . '"/>
        <div class="infos">
            <h1 class="type">' . ucfirst(strtolower($type)) . '</h1>
            <h2 class="titre">' . $album[0]["title"] . '</h2>
        </div>
    </div>
    <div class="musique">
    ';
    foreach($musiques as $musique){
        $artistNames = implode(', ', array_column($musique['artistes'], 'name'));
        $note = $dl->getNoteFromMusique($musique['id']);
        if($note == null){
            $note = 0;
        }
        echo '
            <div class="musique-container">
                <img class="img-pos" src="data:image/jpeg;base64,' . base64_encode($musique["image"]) . '"/>
                <div class="infosMusique">
                    <div class="InfoPrimaire">
                        <p class="titre">' . $musique["title"] . '</p>
                        <p class="artiste">' . $artistNames . '</p>
                        <p class="date">' . $musique["release_date"] . '</p>
                    </div>
                    <div class="InfoSecondaire">
                    <a href="#" onclick="toggleCoeur('. $musique['id'] . ')">
                        <img id="coeur-'.$musique['id'].'" src="./_inc/static/images/coeur_vide.png" alt="coeur">
                    </a>
                        <p class="note">' . $note . '/5</p>
                        </div>
                </div>
            </div>
        ';
    }
    echo '
    </div>
    <div class="artistes">
    ';
    foreach($artistes as $artiste){
        if(!in_array($artiste['id'], $listeArtiste)){
            array_push($listeArtiste, $artiste['id']);
            $allArtiste = $dl->getArtiste($artiste['id']);
            echo '
                <div class="artiste-container">
                    <img class="img-pos" src="data:image/jpeg;base64,' . base64_encode($allArtiste[0]['image']) . '"/>
                    <a class="nom" href="?page=details&type=artiste&id='.$artiste["id"].'">' . $artiste["name"] . '</a>
                </div>
            ';
        }
    }
    echo '
    </div>
</div>

';

?>

<link rel="stylesheet" href="./_inc/static/css/details.css">
<script>
    function toggleCoeur(musiqueId) {
        var coeur = document.getElementById("coeur-" + musiqueId);
        $.ajax({
            type: "POST",
            url: "_inc/methodes/likeTitre.php",
            data: {musiqueId: musiqueId},
            success: function(data){
                if(data.split(".")[1] === "like"){
                    coeur.src = "./_inc/static/images/coeur_blanc.png";
                } else{
                    coeur.src = "./_inc/static/images/coeur_vide.png";
                }
            }
        });
    }
</script>