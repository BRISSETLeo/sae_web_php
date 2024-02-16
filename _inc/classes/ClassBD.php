<?php

class User {
    public $username;
    public $password;
    public $fonction;
    public $current_id;
    public $current_type;
    public $current_musique;
    public $current_time;

    public function __construct($username, $password, $fonction = 'user', $current_id = null, $current_type = null, $current_musique = null, $current_time = null) {
        $this->username = $username;
        $this->password = $password;
        $this->fonction = $fonction;
        $this->current_id = $current_id;
        $this->current_type = $current_type;
        $this->current_musique = $current_musique;
        $this->current_time = $current_time;
    }
}

class Playlist {
    public $id;
    public $name;
    public $description;
    public $visibility;
    public $owner;
    public $image;

    public function __construct($name, $description, $visibility = 0, $owner, $image = null) {
        $this->name = $name;
        $this->description = $description;
        $this->visibility = $visibility;
        $this->owner = $owner;
        $this->image = $image;
    }
}

class Album {
    public $id;
    public $title;
    public $image;

    public function __construct($title, $image = null) {
        $this->title = $title;
        $this->image = $image;
    }
}

class Song {
    public $id;
    public $title;
    public $release_date;
    public $duration;
    public $id_album;
    public $image;
    public $audio;

    public function __construct($title, $release_date, $duration, $id_album = null, $image = null, $audio = null) {
        $this->title = $title;
        $this->release_date = $release_date;
        $this->duration = $duration;
        $this->id_album = $id_album;
        $this->image = $image;
        $this->audio = $audio;
    }
}

class Note {
    public $id_song;
    public $username;
    public $note;

    public function __construct($id_song, $username, $note) {
        $this->id_song = $id_song;
        $this->username = $username;
        $this->note = $note;
    }
}

class Band {
    public $id;
    public $name;
    public $image;

    public function __construct($name, $image = null) {
        $this->name = $name;
        $this->image = $image;
    }
}

class Creer {
    public $id_band;
    public $id_song;

    public function __construct($id_band, $id_song) {
        $this->id_band = $id_band;
        $this->id_song = $id_song;
    }
}

class Composer {
    public $id_playlist;
    public $id_song;

    public function __construct($id_playlist, $id_song) {
        $this->id_playlist = $id_playlist;
        $this->id_song = $id_song;
    }
}
?>
