<?php
$title = $album[0]["title"];

echo '

<div class="container">
    <div class="informations">
        <img src="data:image/jpeg;base64,' . base64_encode($album[0]["image"]) . '"/>
        <p class="type">' . $type . '</p>
        <p class="titre">' . $title . '</p>
    </div>
';