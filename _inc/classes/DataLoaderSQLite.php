<?php

namespace classes;
use Exception;
use PDO;

class DataLoaderSQLite{

    private pdo $pdo;

    public function __construct(){
        $file = __DIR__.'/../data/db.sqlite';
        if(!file_exists($file)){
            touch($file);
        }
        $this->pdo = new PDO('sqlite:'.$file);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->createAllTable(__DIR__.'/../data/Table.sql');
    }

    private function createAllTable($file): void{
        if(!file_exists($file)) throw new Exception('File not found');
        $this->pdo->exec(file_get_contents($file));
    }

    public function insertUser($username, $mdp): bool{
        $username = trim($username);
        $mdp = trim($mdp);
        if($this->userAlreadyInserted($username) || empty($username) || empty($mdp)) return false;
        $username = htmlspecialchars($username);
        $mdp = password_hash($mdp, PASSWORD_DEFAULT);
        $stmt = $this->pdo->prepare('INSERT INTO user (username, password) VALUES (:username, :mdp)');
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':mdp', $mdp);
        return $stmt->execute();
    }

    public function getUserName($username): string{
        $username = trim($username);
        if(empty($username)) return '';
        $username = htmlspecialchars($username);
        $stmt = $this->pdo->prepare('SELECT username FROM user WHERE username = :username');
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    public function createPlaylist($nom, $description, $checkbox, $image){
        $stmt = $this->pdo->prepare('INSERT INTO playlist (name, description, visibility, image, owner) VALUES (:nom, :description, :checkbox, :image, :username)');
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':description', $description);
        if($checkbox === 'on'){
            $stmt->bindValue(':checkbox', 1, PDO::PARAM_INT);
        }else{
            $stmt->bindValue(':checkbox', 0, PDO::PARAM_INT);
        }
        $stmt->bindParam(':image', $image, PDO::PARAM_LOB);
        $stmt->bindParam(':username', $_SESSION['user']);
        $stmt->execute();
    }

    public function getAlbum($id_album){
        if(empty($id_album)) return [];
        $id_album = htmlspecialchars($id_album);
        $stmt = $this->pdo->prepare('SELECT * FROM album WHERE id = :id_album');
        $stmt->bindParam(':id_album', $id_album);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getArtiste($id_band){
        if(empty($id_band)) return [];
        $id_band = htmlspecialchars($id_band);
        $stmt = $this->pdo->prepare('SELECT * FROM band WHERE id = :id_band');
        $stmt->bindParam(':id_band', $id_band);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getMusique($id_musique){
        if(empty($id_musique)) return [];
        $id_musique = htmlspecialchars($id_musique);
        $stmt = $this->pdo->prepare('SELECT * FROM song WHERE id = :id_musique');
        $stmt->bindParam(':id_musique', $id_musique);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getPlaylist($id_playlist){
        if(empty($id_playlist)) return [];
        $id_playlist = htmlspecialchars($id_playlist);
        $stmt = $this->pdo->prepare('SELECT * FROM playlist WHERE id = :id_playlist');
        $stmt->bindParam(':id_playlist', $id_playlist);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getSongByTitle($title){
        $titleWithWildcard = $title . '%';
        $stmt = $this->pdo->prepare('SELECT * FROM song WHERE title LIKE :title');
        $stmt->bindParam(':title', $titleWithWildcard);
        $stmt->execute();
        $res = $stmt->fetchAll();
        for ($i = 0; $i < count($res); $i++) {
            $res[$i]['artistes'] = $this->getAllArtistesFromSong($res[$i]['id']);
        }
        return $res;
    }
    
    public function getSongByBand($band){
        $bandWithWildcard = $band . '%';
        $stmt = $this->pdo->prepare('SELECT * FROM song WHERE id IN (SELECT id_song FROM creer WHERE id_band IN (SELECT id FROM band WHERE name LIKE :band))');
        $stmt->bindParam(':band', $bandWithWildcard);
        $stmt->execute();
        $res = $stmt->fetchAll();
        for ($i = 0; $i < count($res); $i++) {
            $res[$i]['artistes'] = $this->getAllArtistesFromSong($res[$i]['id']);
        }
        return $res;
    }

    public function getAlbumByTitle($title){
        $titleWithWildcard = $title . '%';
        $stmt = $this->pdo->prepare('SELECT * FROM album WHERE title LIKE :title');
        $stmt->bindParam(':title', $titleWithWildcard);
        $stmt->execute();
        $res = $stmt->fetchAll();
        for ($i = 0; $i < count($res); $i++) {
            $res[$i]['artistes'] = $this->getAllArtistesFromAlbum($res[$i]['id']);
        }
        return $res;
    }
    
    public function getAlbumByBand($band){
        $bandWithWildcard = $band . '%';
        $stmt = $this->pdo->prepare('SELECT * FROM album WHERE id IN (SELECT id_album FROM song WHERE id IN (SELECT id_song FROM creer WHERE id_band IN (SELECT id FROM band WHERE name LIKE :band)))');
        $stmt->bindParam(':band', $bandWithWildcard);
        $stmt->execute();
        $res = $stmt->fetchAll();
        for ($i = 0; $i < count($res); $i++) {
            $res[$i]['artistes'] = $this->getAllArtistesFromAlbum($res[$i]['id']);
        }
        return $res;
    }

    public function getPlaylistByName($name){
        $nameWithWildcard = $name . '%';
        $stmt = $this->pdo->prepare('SELECT * FROM playlist WHERE name LIKE :name AND visibility = 1');
        $stmt->bindParam(':name', $nameWithWildcard);
        $stmt->execute();
        $res = $stmt->fetchAll();
        for ($i = 0; $i < count($res); $i++) {
            $res[$i]['artistes'] = $this->getAllArtistesFromPlaylist($res[$i]['id']);
        }
        return $res;
    }

    public function getPlaylistByOwner($owner){
        $ownerWithWildcard = $owner . '%';
        $stmt = $this->pdo->prepare('SELECT * FROM playlist WHERE owner LIKE :owner AND visibility = 1');
        $stmt->bindParam(':owner', $ownerWithWildcard);
        $stmt->execute();
        $res = $stmt->fetchAll();
        for ($i = 0; $i < count($res); $i++) {
            $res[$i]['artistes'] = $this->getAllArtistesFromPlaylist($res[$i]['id']);
        }
        return $res;
    }

    public function getAllArtistesFromPlaylist($id_playlist): array{
        $stmt = $this->pdo->prepare('SELECT DISTINCT b.name FROM band b JOIN creer cr ON b.id = cr.id_band
        JOIN song s ON cr.id_song = s.id
        JOIN composer c ON s.id = c.id_song
        JOIN playlist p ON c.id_playlist = p.id
        WHERE p.id = :id_playlist');
        $stmt->bindParam(':id_playlist', $id_playlist);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getAllTableArtisteFromPlaylist($id_playlist): array{
        $stmt = $this->pdo->prepare('SELECT DISTINCT b.* FROM band b JOIN creer cr ON b.id = cr.id_band
        JOIN song s ON cr.id_song = s.id
        JOIN composer c ON s.id = c.id_song
        JOIN playlist p ON c.id_playlist = p.id
        WHERE p.id = :id_playlist');
        $stmt->bindParam(':id_playlist', $id_playlist);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getAllMusiqueFromPlaylist($id_playlist): array{
        $stmt = $this->pdo->prepare('SELECT s.* FROM song s JOIN composer c ON s.id = c.id_song JOIN playlist p ON c.id_playlist = p.id WHERE p.id = :id_playlist');
        $stmt->bindParam(':id_playlist', $id_playlist);
        $stmt->execute();
        $res = $stmt->fetchAll();
        for ($i = 0; $i < count($res); $i++) {
            $res[$i]['artistes'] = $this->getAllArtistesFromSong($res[$i]['id']);
        }
        return $res;
    }
    

    public function getArtisteByName($name){
        $nameWithWildcard = $name . '%';
        $stmt = $this->pdo->prepare('SELECT * FROM band WHERE name LIKE :name');
        $stmt->bindParam(':name', $nameWithWildcard);
        $stmt->execute();
        return $stmt->fetchAll();
    }    

    public function connectUser($username, $mdp): bool{
        $username = trim($username);
        $mdp = trim($mdp);	
        if(empty($username) || empty($mdp)) return false;
        $username = htmlspecialchars($username);
        $stmt = $this->pdo->prepare('SELECT password FROM user WHERE username = :username');
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $hash = $stmt->fetchColumn();
        return password_verify($mdp, $hash);
    }

    public function getAllSongswithNote(): array{
        $stmt = $this->pdo->prepare('SELECT song.*, AVG(note.note) as "note" FROM song LEFT JOIN note ON song.id = note.id_song GROUP BY song.id ORDER BY note DESC');
        $stmt->execute();
        $res = $stmt->fetchAll();
        for ($i = 0; $i < count($res); $i++) {
            $res[$i]['artistes'] = $this->getAllArtistesFromSong($res[$i]['id']);
        }
        return $res;
    }

    public function getAllArtistesFromSong($id_song): array{
        $stmt = $this->pdo->prepare('SELECT band.name FROM band JOIN creer ON band.id = creer.id_band WHERE creer.id_song = :id_song');
        $stmt->bindParam(':id_song', $id_song);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getAllAlbumsWithNote(): array{
        $stmt = $this->pdo->prepare('SELECT album.*, AVG(note.note) as "note" FROM album LEFT JOIN song ON album.id = song.id_album LEFT JOIN note ON song.id = note.id_song GROUP BY album.id ORDER BY note DESC');
        $stmt->execute();
        $res = $stmt->fetchAll();
        for ($i = 0; $i < count($res); $i++) {
            $res[$i]['artistes'] = $this->getAllArtistesFromAlbum($res[$i]['id']);
        }
        return $res;
    }

    public function getAllArtistesFromAlbum($id_album): array{
        $stmt = $this->pdo->prepare('SELECT b.id, b.name FROM song s JOIN album a ON s.id_album = a.id JOIN creer c ON c.id_song = s.id JOIN band b ON c.id_band = b.id WHERE a.id = :id_album');
        $stmt->bindParam(':id_album', $id_album);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getAllMusiqueFromAlbum($id_album): array{
        $stmt = $this->pdo->prepare('select * from song where id_album = :id_album');
        $stmt->bindParam(':id_album', $id_album);
        $stmt->execute();
        $res = $stmt->fetchAll();
        for ($i = 0; $i < count($res); $i++) {
            $res[$i]['artistes'] = $this->getAllArtistesFromSong($res[$i]['id']);
        }
        return $res;
    }

    public function getNoteFromMusique($id_song): float{
        $stmt = $this->pdo->prepare('SELECT AVG(note) FROM note WHERE id_song = :id_song');
        $stmt->bindParam(':id_song', $id_song);
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    public function getAllMusiqueFromArtiste($id_band): array{
        $stmt = $this->pdo->prepare('SELECT * FROM song JOIN creer ON song.id = creer.id_song WHERE creer.id_band = :id_band');
        $stmt->bindParam(':id_band', $id_band);
        $stmt->execute();
        return $stmt->fetchAll();
    }


    public function getAllAlbumFromArtiste($id_band): array {
        $stmt = $this->pdo->prepare('SELECT DISTINCT a.*
                                    FROM album a
                                    JOIN song s ON a.id = s.id_album
                                    JOIN creer c ON s.id = c.id_song
                                    WHERE c.id_band = :id_band');
        $stmt->bindParam(':id_band', $id_band);
        $stmt->execute();
        return $stmt->fetchAll();
    }    

    public function isAdminRole($username){
        $stmt = $this->pdo->prepare('SELECT fonction FROM user WHERE username=:username');
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $res = $stmt->fetch();
        return $res !== null ? $res[0] === 'admin' : false;
    }
    

    public function getAllMyPlaylist($username): array{
        $username = trim($username);
        if(empty($username)) return [];
        $username = htmlspecialchars($username);
        $stmt = $this->pdo->prepare('SELECT * FROM playlist WHERE `owner` = :username');
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    private function userAlreadyInserted($username): bool{
        $stmt = $this->pdo->prepare('SELECT * FROM user WHERE username = :username');
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        return $stmt->fetch() !== false;
    }



    // insertion des données dans la base de données




    function insertBand($name, $image) {
        $stmt = $this->pdo->prepare("INSERT INTO `band` (name, image) VALUES (?, ?)");
        $stmt->bindParam(1, $name);
        $stmt->bindParam(2, $image, PDO::PARAM_LOB); // Utiliser PDO::PARAM_LOB pour les données binaires
        $stmt->execute();
    }

    // Fonction pour insérer des données dans la table album
    function insertAlbum($title, $image) {
        $stmt = $this->pdo->prepare("INSERT INTO `album` (title, image) VALUES (?, ?)");
        $stmt->bindParam(1, $title);
        $stmt->bindParam(2, $image, PDO::PARAM_LOB);
        $stmt->execute();
    }

    // Fonction pour insérer des données dans la table song
    function insertSong($title, $release_date, $duration, $id_album, $image, $audio) {
        $stmt = $this->pdo->prepare("INSERT INTO `song` (title, release_date, duration, id_album, image, audio) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bindParam(1, $title);
        $stmt->bindParam(2, $release_date);
        $stmt->bindParam(3, $duration);
        $stmt->bindParam(4, $id_album);
        $stmt->bindParam(5, $image, PDO::PARAM_LOB);
        $stmt->bindParam(6, $audio, PDO::PARAM_LOB);
        $stmt->execute();
    }

    // Fonction pour insérer des données dans la table creer
    function insertCreer($id_band, $id_song) {
        $stmt = $this->pdo->prepare("INSERT INTO `creer` (id_band, id_song) VALUES (?, ?)");
        $stmt->bindParam(1, $id_band);
        $stmt->bindParam(2, $id_song);
        $stmt->execute();
    }

    public function insertNote($id_song, $username, $note){
        $stmt = $this->pdo->prepare('INSERT INTO note (id_song, username, note) VALUES (:id_song, :username, :note)');
        $stmt->bindParam(':id_song', $id_song);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':note', $note);
        return $stmt->execute();
    }

    function deleteAll(){
        $this->pdo->exec('DELETE FROM user');
        $this->pdo->exec('DELETE FROM band');
        $this->pdo->exec('DELETE FROM album');
        $this->pdo->exec('DELETE FROM song');
        $this->pdo->exec('DELETE FROM creer');
    }

}