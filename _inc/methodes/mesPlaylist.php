<?php

require '../../loader.php';

if(!isset($_SESSION['user'])) {
    header('Location: ./');
    exit();
}

use classes\DataLoaderSQLite;
$dl = new DataLoaderSQLite();
$mesPlaylist = $dl->getAllMyPlaylist($_SESSION['user']);

foreach ($mesPlaylist as $playlist) {
    if($playlist['image'] !== null){
        $playlist['image'] = base64_encode($playlist['image']);
        $playlist['4'] = base64_encode($playlist['4']);
    }
    var_dump($playlist);
}

echo json_encode(array(
    'success' => true,
    'mesPlaylist' => $mesPlaylist
));