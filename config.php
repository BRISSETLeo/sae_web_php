<?php

require '_inc/AutoLoader.php'; 
Autoloader::register();

session_start();

use classes\Template;
use classes\DataLoaderSQLite;

$template = new Template('./_inc/templates/template.php');
$pdo = new DataLoaderSqlite();