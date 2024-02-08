<?php

namespace classes;
use PDO;

/**
* Class DataLoaderSQLite
* 
* Cette classe est utilisé pour récupérer des informations d'une base de donnée sqlite
* 
* @package classes
*/
class DataLoaderSQLite{
    
    /**
    * @var pdo $pdo
    */
    private pdo $pdo;

    /**
    * Constructor
    *
    * @return void
    */
    public function __construct(){

        if(!file_exists('./data/db.sqlite')){
            touch('./data/db.sqlite');
        }

        $this->pdo = new PDO('sqlite:./data/db.sqlite');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->pdo->exec('PRAGMA encoding = "UTF-8";');
        $this->createTable('./data/Base.sql');
    }

    private function createTable($sql_file){
        $sql = file_get_contents($sql_file);
        $this->pdo->exec($sql);
    }

    public function insertUser($pseudo, $password){
        if($this->userAlreadyExist($pseudo)){
            return false;
        }
        $pseudo = htmlspecialchars($pseudo);
        $password = htmlspecialchars($password);
        $password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO `user` (name_user, password) VALUES ('$pseudo', '$password')";
        $result = $this->pdo->exec($sql);
        return $result;
    }

    public function userAlreadyExist($pseudo): bool{
        $pseudo = htmlspecialchars($pseudo);
        $sql = "SELECT * FROM `user` WHERE name_user = '$pseudo'";
        $result = $this->pdo->query($sql);
        $result = $result->fetch(PDO::FETCH_ASSOC);
        if($result){
            return true;
        }
        return false;
    }

    public function isUser($pseudo, $password): bool{
        $pseudo = htmlspecialchars($pseudo);
        $password = htmlspecialchars($password);
        $sql = "SELECT * FROM `user` WHERE name_user = '$pseudo'";
        $result = $this->pdo->query($sql);
        $result = $result->fetch(PDO::FETCH_ASSOC);
        if($result){
            if(password_verify($password, $result['password'])){
                return true;
            }else{
                return false;
            }
        }
        return false;
    }

    public function getBestAlbums(): array {
        $sql = "SELECT
                    a.id_album,
                    a.name AS album_name,
                    a.image_album,
                    AVG(ns.note) AS average_note
                FROM
                    album a
                JOIN
                    song s ON a.id_album = s.id_album
                LEFT JOIN
                    note_song ns ON s.id_song = ns.id_song
                GROUP BY
                    a.id_album, a.name
                ORDER BY
                    average_note DESC
                LIMIT 5;";
        
        $result = $this->pdo->query($sql);
        $albums = $result->fetchAll(PDO::FETCH_ASSOC);
    
        foreach ($albums as &$album) {
            $artists = $this->getArtistsForAlbum($album['id_album']);
            $album['artists'] = $artists;
        }
    
        return $albums;
    }
    

    public function getBestMusiques(): array{
        $sql = "SELECT
                    s.id_song,
                    s.name AS song_name,
                    s.image_song,
                    AVG(ns.note) AS average_note
                FROM
                    song s
                LEFT JOIN
                    note_song ns ON s.id_song = ns.id_song
                GROUP BY
                    s.id_song, s.name
                ORDER BY
                    average_note DESC
                LIMIT 5;
                ";
        $result = $this->pdo->query($sql);
        $result = $result->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getArtistsForAlbum($albumId): string {
        $sql = "select distinct b.name_band from album a join song s on a.id_album = s.id_album join band b on s.id_band = b.id_band where a.id_album = :albumId;";
    
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':albumId', $albumId, PDO::PARAM_INT);
        $stmt->execute();
    
        $artists = $stmt->fetchAll(PDO::FETCH_COLUMN);
    
        return implode(', ', $artists);
    }
    
    public function getNoteSong($id_song): float{
        $sql = "SELECT AVG(note) FROM `note_song` WHERE id_song = $id_song";
        $result = $this->pdo->query($sql);
        $result = $result->fetch(PDO::FETCH_ASSOC);
        print_r($result);
        return $result['AVG(note)'];
    }

    public function getAlbums(): array{
        $sql = "SELECT * FROM `album`";
        $result = $this->pdo->query($sql);
        $result = $result->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    private function idAlbumExist($id_album): bool{
        $id_album = htmlspecialchars($id_album);
        $sql = "SELECT * FROM `album` WHERE id_album = $id_album";
        $result = $this->pdo->query($sql);
        $result = $result->fetch(PDO::FETCH_ASSOC);
        if($result){
            return true;
        }
        return false;
    }

    public function getAlbum($id_album): array{
        if (!$this->idAlbumExist($id_album)){
            return [];
        }
        $id_album = htmlspecialchars($id_album);
        $sql = "SELECT * FROM `album` WHERE id_album = $id_album";
        $result = $this->pdo->query($sql);
        $result = $result->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function userHasPlayList($pseudo){
        $pseudo = htmlspecialchars($pseudo);
        $sql = "SELECT * FROM `playlist` WHERE owner_name = '$pseudo'";
        $result = $this->pdo->query($sql);
        $result = $result->fetch(PDO::FETCH_ASSOC);
        if($result){
            return true;
        }
        return false;
    }

    public function getMusiqueAlbum($id_album){
        $sql = "SELECT * FROM `song` WHERE id_album = $id_album";
        $result = $this->pdo->query($sql);
        $result = $result->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    
    public function getPdo(){
        return $this->pdo;
    }

    public function searchMusic($query){
        $query = htmlspecialchars($query);
        $sql = "SELECT * FROM `song` WHERE name LIKE '%$query%'";
        $result = $this->pdo->query($sql);
        $result = $result->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

}
