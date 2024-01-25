<?php

require './launchautoloader.php';
use classes\templates;

$template = new Templates('_inc/templates/template.php');
$template->render("_inc/templates/accueil.php");

?>