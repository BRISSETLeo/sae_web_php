<?php

require 'loader.php';

use classes\DataLoaderSQLite;
$dataLoaderSQLite = new DataLoaderSQLite();

$dataLoaderSQLite->insertUser($_POST['pseudo'], $_POST['password']);

$_SESSION['pseudo'] = $_POST['pseudo'];

echo json_encode(array("success" => true));