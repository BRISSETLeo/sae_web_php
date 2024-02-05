<?php

require './loader.php';

use classes\DataLoaderSQLite;
$dataLoaderSQLite = new DataLoaderSQLite();

$isUser = $dataLoaderSQLite->userAlreadyExist($_POST['pseudo']);

echo json_encode(array("isUser" => $isUser));