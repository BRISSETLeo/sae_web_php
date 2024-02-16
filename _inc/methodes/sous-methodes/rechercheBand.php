<?php

function bandToJson($lesBandByName){
    $renvoi = array();
    foreach ($lesBandByName as $artiste) {
        if($artiste['image'] !== null){
            $artiste['image'] = base64_encode($artiste['image']);
            $artiste['2'] = base64_encode($artiste['2']);
        }
        $renvoi[$artiste['id']] = $artiste;
    }
    return $renvoi;
}