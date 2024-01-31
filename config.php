<?php

require '_inc/AutoLoader.php'; 
Autoloader::register();

session_start();

require '_inc/autoloader.php'; 
Autoloader::register(); 

use classes\templates;
use classes\dataloadersqlite;

$template = new Templates('./_inc/templates/template.php');
$pdo = new DataLoaderSqlite();

?>

