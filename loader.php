<?php

session_start();
require '_inc/AutoLoader.php';
AutoLoader::register();

use classes\Template;

$template = new Template('');
