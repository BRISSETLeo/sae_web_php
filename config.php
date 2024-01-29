<?php

session_start();

require '_inc/AutoLoader.php'; 
Autoloader::register(); 

use classes\Template;
use classes\DataLoaderSQLite;

$template = new Template('./_inc/templates/template.php');
$pdo = new DataLoaderSQLite();

session_start();

require '_inc/autoloader.php'; 
Autoloader::register(); 

use classes\templates;
use classes\dataloadersqlite;

$template = new Templates('./_inc/templates/template.php');
$pdo = new DataLoaderSqlite();

?>
