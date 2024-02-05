<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="static/css/album.css">
</head>
<body>

<?php
use classes\DataLoaderSQLite;
$dataLoaderSQLite = new DataLoaderSQLite();

$id_album = $_GET['id'];
$album = $dataLoaderSQLite->getAlbum($id_album);
$musiqueAlbum = $dataLoaderSQLite->getMusiqueAlbum($id_album);

if (empty($album)) {
    header('Location: ./');
    exit;
}

function formatDuration($seconds) {
    if ($seconds < 3600) {
        return gmdate("i:s", $seconds);
    }
    else {
        return gmdate("H:i:s", $seconds);
    }
}
$total_duration = 0;
foreach ($musiqueAlbum as $musique) {
    $total_duration += $musique['duration'];
}
?>

<div class="album-details">
    <div class="album-info">
        <img src="data:image/jpeg;base64,<?= base64_encode($album["image_album"]) ?>" alt="<?= $album['name'] ?>">
        <p><?= $album['name'] ?></p>
        <p>environ <?=formatDuration($total_duration) ?></p>
    </div>

    <div class="song-list">
        <h2>Songs</h2>
        <div class="categorie">
            <p>Titre</p>
            <p>Album</p>
            <p>Date d'ajout</p>
            <p>Durée</p>
        </div>

            <?php
            if (!empty($musiqueAlbum)) {
                foreach ($musiqueAlbum as $musique) {
                    echo '<div class="song-info">';
                    echo '<p>' . $musique['name'] . '</p>';
                    echo '<p>' . $musique['id_album'] . '</p>';
                    echo '<p>' . $musique['date'] . '</p>';
                    echo '<p>' . formatDuration($musique['duration']) . '</p>';
                    echo '</div>';
                }
            } else {
                echo '<p>Il n\'y a pas de musique dans cet album</p>';
            }
            ?>
    </div>
</div>

</body>
</html>
