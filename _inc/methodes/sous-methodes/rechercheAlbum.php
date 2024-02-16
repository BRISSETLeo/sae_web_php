<?php

function albumToJson($lesAlbumsByTitle, $lesAlbumsByBand){
    $renvoi = array();
    foreach ($lesAlbumsByTitle as $album) {
        if($album['image'] !== null){
            $album['image'] = base64_encode($album['image']);
            $album['2'] = base64_encode($album['2']);
        }
        $renvoi[$album['id']] = $album;
    }
    foreach ($lesAlbumsByBand as $album) {
        if(!in_array($album['id'], array_keys($renvoi))){
            if($album['image'] !== null){
                $album['image'] = base64_encode($album['image']);
                $album['2'] = base64_encode($album['2']);
            }
            $renvoi[$album['id']] = $album;
        }
    }
    return $renvoi;
}