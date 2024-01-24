<?php

require '_inc/autoloader.php'; 
Autoloader::register(); 

use classes\dataloadersqlite;
use classes\templates;

$template = new Templates('_inc/templates/template.php');
$template->render("test.php");

?>