<?php

require '_inc/autoloader.php'; 
Autoloader::register(); 

use classes\templates;

$template = new Templates('_inc/templates/template.php');
$template->render("_inc/templates/identification.php");

?>