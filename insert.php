<?php

require './loader.php';

use classes\DataLoaderSQLite;

$dl = new DataLoaderSQLite();

$dl->deleteAll();

$dl->insertBand('Superdrag', file_get_contents('_inc/data/fixtures/images/Superdrag-Stereo_360_Sound.jpg'));
$dl->insertSong('Stereo 360 Sound', '01/01/1998', 0, 1, file_get_contents('_inc/data/fixtures/images/Superdrag-Stereo_360_Sound.jpg'), NULL);
$dl->insertCreer(1, 1);
$dl->insertNote(1, 'nocros', 5);

$dl->insertBand('16 Horsepower', file_get_contents('_inc/data/fixtures/images/220px-Folklore_hp.jpg'));
$dl->insertSong('Folklore', '01/01/2002', 0, 1, file_get_contents('_inc/data/fixtures/images/220px-Folklore_hp.jpg'), NULL);
$dl->insertCreer(2, 2);
$dl->insertNote(2, 'nocros', 2.5);

$dl->insertAlbum('Le Meilleur Des Années 80', file_get_contents('_inc/data/mesDonnees/Le_Meilleur_Des_Années_80.jpg'));

echo "Insertions réussies.";