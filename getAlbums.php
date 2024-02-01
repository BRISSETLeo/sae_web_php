<?php

$response = array('success' => true, 'albums' => 'albums');

header('Content-Type: application/json');

echo json_encode($response);

?>
