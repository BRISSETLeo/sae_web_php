<?php

namespace classes;

use \PDO;

class DataLoaderSqlite{
    
    private pdo $pdo;

    public function __construct(){
        $this->pdo = new PDO('sqlite:db.sqlite');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    

}

?>