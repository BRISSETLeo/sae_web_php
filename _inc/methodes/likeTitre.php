<?php
require '../../loader.php';

use classes\DataLoaderSQLite;

if (isset($_POST['musiqueId'])) {
    $dl = new DataLoaderSQLite();

    if(!$dl->titreIsliked($_SESSION['user'], $_POST['musiqueId'])){
        $dl->likeTitre($_SESSION['user']);
        echo "like";
        exit();
    } else {
        $dl->unlikeTitrePlaylist($_SESSION['user']);
        echo "dislike";
        exit();
    }
} else {
    echo "Erreur: l'identifiant de la musique n'est pas défini.";
    exit();
}