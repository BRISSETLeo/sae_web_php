<?php 

namespace classes;
use PDO;

class YamlParser {

    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function parseYamlFile($yamlFilePath)
    {
        $yamlContent = file_get_contents($yamlFilePath);
        $entries = explode('- by:', $yamlContent);
        $results = [];

        array_shift($entries);

        foreach ($entries as $entry) {
            $lines = explode(PHP_EOL, trim($entry));
            $data = $this->parseLines($lines);
            $results[] = $data;
        }

        $this->processResults($results);
    }

    private function parseLines($lines)
    {
        $data = [];

        foreach ($lines as $line) {
            if (strpos($line, ':') === false) {
                $data['by'] = $line;
            }
            if (!empty($line) && strpos($line, ':') !== false) {
                list($key, $value) = array_map('trim', explode(':', $line, 2));
                $data[$key] = trim($value);
            }
        }

        return $data;
    }

    private function processResults($results)
    {
        foreach ($results as $result) {
            $artiste = $result['by'];
            $genre = $result['genre'];
            $img = './data/fixtures/images/' . $result['img'];
            $releaseYear = $result['releaseYear'];
            $title = $result['title'];
    
            $artistId = $this->getOrCreateArtistId($artiste, $img);
            $albumId = $this->getOrCreateAlbumId($title, $img);
            //$songId = $this->createSong($title, $genre, $releaseYear, $albumId, $artistId, $img);
        }
    }
    
    private function getOrCreateArtistId($artiste, $img)
    {
        $stmtCheckArtist = $this->pdo->prepare("SELECT id_band FROM band WHERE name_band = :artiste");
        $stmtCheckArtist->bindParam(':artiste', $artiste);
        $stmtCheckArtist->execute();
        $existingArtist = $stmtCheckArtist->fetch(PDO::FETCH_ASSOC);
    
        if (!$existingArtist) {
            $artistId = $this->insertNewArtist($artiste, $img);
        } else {
            $artistId = $existingArtist['id_band'];
        }
    
        return $artistId;
    }
    
    private function insertNewArtist($artiste, $imgPath)
    {
        // Lire le contenu de l'image en tant que données binaires
        $imgData = file_get_contents($imgPath);

        $stmtInsertArtist = $this->pdo->prepare("INSERT INTO band (name_band, image_band) VALUES (:artiste, :img)");
        $stmtInsertArtist->bindParam(':artiste', $artiste);
        $stmtInsertArtist->bindParam(':img', $imgData, PDO::PARAM_LOB); // Utiliser PDO::PARAM_LOB pour les données binaires
        $stmtInsertArtist->execute();

        return $this->pdo->lastInsertId();
    }
    
    private function getOrCreateAlbumId($title, $img)
    {
        $stmtCheckAlbum = $this->pdo->prepare("SELECT id_album FROM album WHERE name = :title");
        $stmtCheckAlbum->bindParam(':title', $title);
        $stmtCheckAlbum->execute();
        $existingAlbum = $stmtCheckAlbum->fetch(PDO::FETCH_ASSOC);
    
        if (!$existingAlbum) {
            $albumId = $this->insertNewAlbum($title, $img);
        } else {
            $albumId = $existingAlbum['id_album'];
        }
    
        return $albumId;
    }
    
    private function insertNewAlbum($title, $imgPath)
    {
        // Lire le contenu de l'image en tant que données binaires
        $imgData = file_get_contents($imgPath);

        $stmtInsertAlbum = $this->pdo->prepare("INSERT INTO album (name, image_album) VALUES (:title, :img)");
        $stmtInsertAlbum->bindParam(':title', $title);
        $stmtInsertAlbum->bindParam(':img', $imgData, PDO::PARAM_LOB); // Utiliser PDO::PARAM_LOB pour les données binaires
        $stmtInsertAlbum->execute();

        return $this->pdo->lastInsertId();
    }

    private function createSong($title, $genre, $releaseYear, $albumId, $artistId, $img)
    {
        $stmtInsertSong = $this->pdo->prepare("INSERT INTO song (title, genre, releaseYear, id_album, id_band, image_song) VALUES (:title, :genre, :releaseYear, :albumId, :artistId, :img)");
        $stmtInsertSong->bindParam(':title', $title);
        $stmtInsertSong->bindParam(':genre', $genre);
        $stmtInsertSong->bindParam(':releaseYear', $releaseYear);
        $stmtInsertSong->bindParam(':albumId', $albumId);
        $stmtInsertSong->bindParam(':artistId', $artistId);
        $stmtInsertSong->bindParam(':img', $img);
        $stmtInsertSong->execute();

        return $this->pdo->lastInsertId();
    }
    

}
