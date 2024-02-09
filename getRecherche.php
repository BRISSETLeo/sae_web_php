<?php

require './loader.php';

use classes\DataLoaderSQLite;

$dataLoaderSQLite = new DataLoaderSQLite();

    $query = $_POST['recherche'];
    $results = $dataLoaderSQLite->rechercheDichotomique($query);
    if (count($results) > 0) {
        echo json_encode($results);
    } else {
        echo json_encode('Aucun résultat trouvé.');
    }
