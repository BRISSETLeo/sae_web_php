<?php

namespace classes;

use \PDO;

/**
* Class DataLoaderSqlite
* 
* Cette classe est utilisé pour récupérer des informations d'une base de donnée sqlite
* 
* @package classes    
*/
class DataLoaderSqlite{
    
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
        $this->pdo = new PDO('sqlite:db.sqlite');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->createTable('./Base.sql');
    }

    private function createTable($sql_file){
        $sql = file_get_contents($sql_file);
        $this->pdo->exec($sql);
    }

    

}

?>