<?php 

$albumsMieuxNotes = getAlbumsMieuxNotes();
$albumsPlusEnregistre = getAlbumsPlusEnregistre();

function getAlbumsMieuxNotes() {
    $albums = array();
    $albums["1"] = array("description" => "Première album machargggrrgrgrgrgrgrglala", "titre" => "test", "note" => 5);
    $albums["2"] = array("description" => "étest", "titre" => "étest", "note" => 4);
    $albums["3"] = array("description" => "troisieme", "titre" => "troisieme", "note" => 10);
    $albums["4"] = array("description" => "quatrieme", "titre" => "quatrieme", "note" => 1);
    $albums["5"] = array("description" => "cinquieme", "titre" => "cinquieme", "note" => 2);
    usort($albums, function($a, $b) {
        return $b['note'] - $a['note'];
    });
    $albums8Premiers = array_slice($albums, 0, 8);
    return $albums8Premiers;
}

function getAlbumsPlusEnregistre() {
    $albums = array();
    $albums["1"] = array("description" => "Première album machargggrrgrgrgrgrgrglala", "titre" => "test", "note" => 5);
    $albums["2"] = array("description" => "étest", "titre" => "étest", "note" => 4);
    $albums["3"] = array("description" => "troisieme", "titre" => "troisieme", "note" => 10);
    $albums["4"] = array("description" => "quatrieme", "titre" => "quatrieme", "note" => 1);
    $albums["5"] = array("description" => "cinquieme", "titre" => "cinquieme", "note" => 2);
    $albums["6"] = array("description" => "Première album machargggrrgrgrgrgrgrglala", "titre" => "test", "note" => 5);
    $albums["7"] = array("description" => "étest", "titre" => "étest", "note" => 4);
    $albums["8"] = array("description" => "troisieme", "titre" => "troisieme", "note" => 10);
    $albums["9"] = array("description" => "quatrieme", "titre" => "quatrieme", "note" => 1);
    $albums["10"] = array("description" => "cinquieme", "titre" => "cinquieme", "note" => 2);
    usort($albums, function($a, $b) {
        return $b['note'] - $a['note'];
    });
    $albums8Premiers = array_slice($albums, 0, 8);
    return $albums8Premiers;
}

?>

<link rel="stylesheet" href="./_inc/static/css/accueil.css" />
<h2>Les albums les mieux notés :</h2>
<div id="container">
    <?php foreach ($albumsMieuxNotes as $album) { ?>
        <div class="top">
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
<div id="container">
    <?php foreach ($albumsPlusEnregistre as $album) { ?>
        <div class="top">
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