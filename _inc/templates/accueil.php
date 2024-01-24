<?php 

$albumsMieuxNotes = getAlbumsMieuxNotes();

function getAlbumsMieuxNotes() {
    $albums = array();
    $albums["1"] = array("description" => "test", "titre" => "test", "note" => 5);
    $albums["2"] = array("description" => "étest", "titre" => "étest", "note" => 4);
    $albums["3"] = array("description" => "troisieme", "titre" => "troisieme", "note" => 10);
    return $albums;
}

?>

<link rel="stylesheet" href="./_inc/static/css/accueil.css" />
<h2>Les albums les mieux notés :</h2>
<div id="container">
    <?php foreach ($albumsMieuxNotes as $album) { ?>
        <div class="mieux-note">
            <img src="./_inc/static/images/no-image.png" alt="Image de l'album" />
            <img class="play" src="./_inc/static/images/play.png" alt="Jouer l'album" />
            <div class="informations">
                <h3><?php echo $album['titre']; ?></h3>
                <p><?php echo $album['description']; ?></p>
                <p>Note : <?php echo $album['note']; ?></p>
            </div>
        </div>
    <?php } ?>
</div>
<h2>Les albums les plus enregistrés :</h2>