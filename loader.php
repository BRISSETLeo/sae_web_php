<?php

session_start();
require '_inc/AutoLoader.php';
AutoLoader::register();

use classes\DataLoaderSQLite;

$dataLoader = new DataLoaderSQLite();