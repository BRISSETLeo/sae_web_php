<?php

session_start();
$_SESSION['pseudo'] = null;
header("Location: ./index.php");
