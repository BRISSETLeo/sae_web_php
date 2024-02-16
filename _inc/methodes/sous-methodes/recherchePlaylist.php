<?php

function playlistToJson($lesPlaylistByName, $lesPlaylistByOwner){
    $renvoi = array();
    foreach ($lesPlaylistByName as $playlist) {
        if($playlist['image'] !== null){
            $playlist['image'] = base64_encode($playlist['image']);
            $playlist['4'] = base64_encode($playlist['4']);
        }
        $renvoi[$playlist['id']] = $playlist;
    }
    foreach ($lesPlaylistByOwner as $playlist) {
        if(!in_array($playlist['id'], array_keys($renvoi))){
            if($playlist['image'] !== null){
                $playlist['image'] = base64_encode($playlist['image']);
                $playlist['4'] = base64_encode($playlist['4']);
            }
            $renvoi[$playlist['id']] = $playlist;
        }
    }
    return $renvoi;
}