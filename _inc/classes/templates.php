<?php

namespace classes;

/**
* Class Templates
*
* Cette classe est utilisé pour utiliser des templates
*
* @package classes    
*/
class Templates{

    /**
    * @var string $path Chemin vers le template
    */

    private string $path;

    /**
    * Constructeur de la classe
    * @param string $path Chemin vers le template
    */
    public function __construct(string $path){
        $this->path = $path;
    }

    /**
    * Affiche le template
    * @param string $chemin Chemin vers le fichier à inclure
    */
    public function render(string $chemin): string{
        if (file_exists($chemin)) {
            $content = file_get_contents($chemin);
        } else {
            $content = "Le fichier n'existe pas";
        }
        require $this->path;        
    }

}

?>