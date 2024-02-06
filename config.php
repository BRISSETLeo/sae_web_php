<?php

session_start();

session_start();

require '_inc/AutoLoader.php'; 
Autoloader::register(); 

use classes\Template;
use classes\DataLoaderSQLite;

$template = new Template('./_inc/templates/template.php');
$pdo = new DataLoaderSqlite();

?>
