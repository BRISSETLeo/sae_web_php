<?php

session_start();

require '_inc/AutoLoader.php'; 
Autoloader::register(); 

use classes\DataLoaderSQLite;
$dataLoaderSQLite = new DataLoaderSQLite();

$t = $dataLoaderSQLite->isUser('toto', 'toto');

?>
