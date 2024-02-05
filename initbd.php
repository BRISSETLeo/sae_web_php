<?php 

require 'loader.php';

use classes\DataLoaderSQLite;
use classes\YamlParser;

$pdo = new DataLoaderSQLite();
$yamlParser = new YamlParser($pdo->getPdo());

$yamlParser->parseYamlFile('data/fixtures/extrait.yml');

echo "Hello World!";

header("location: ./");
exit;