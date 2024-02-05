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

    public function getAlbums(): array{
        $sql = "SELECT * FROM `album`";
        $result = $this->pdo->query($sql);
        $result = $result->fetchAll(PDO::FETCH_ASSOC);
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
    
    public function getPdo(){
        return $this->pdo;
    }

}
