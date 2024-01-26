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

$yamlContent = file_get_contents('./data/fixtures/extrait.yml');

$entries = explode('- by:', $yamlContent);

$results = [];

array_shift($entries);

foreach ($entries as $entry) {
    $lines = explode(PHP_EOL, trim($entry));

    $data = [];

    foreach ($lines as $line) {
        if(strpos($line, ':') === false){
            $data['by'] = $line;
        }
        if (!empty($line) && strpos($line, ':') !== false) {
            list($key, $value) = array_map('trim', explode(':', $line, 2));
            $data[$key] = trim($value);
        }
    }

    $results[] = $data;
}

foreach ($results as $result) {
    $by = $result['by'];
    $entryId = $result['entryId'];
    $genre = $result['genre'];
    $img = $result['img'];
    $parent = $result['parent'];
    $releaseYear = $result['releaseYear'];
    $title = $result['title'];
    
    
}