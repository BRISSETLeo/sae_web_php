<?php

function songToJson($lesSongsByTitle, $lesSongsByBand){
    $renvoi = array();
    foreach ($lesSongsByTitle as $song) {
        if($song['image'] !== null){
            $song['image'] = base64_encode($song['image']);
            $song['5'] = base64_encode($song['5']);
        }
        $renvoi[$song['id']] = $song;
    }
    foreach ($lesSongsByBand as $song) {
        if(!in_array($song['id'], array_keys($renvoi))){
            if($song['image'] !== null){
                $song['image'] = base64_encode($song['image']);
                $song['5'] = base64_encode($song['5']);
            }
            $renvoi[$song['id']] = $song;
        }
    }
    return $renvoi;
}