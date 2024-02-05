<?php

namespace classes;

/**
* Class Templates
*
* Cette classe est utilisé pour utiliser des templates
*
* @package classes    
*/
class Template{

    /**
    * @var string $template Chemin vers le template
    */
    private string $template;

    /**
    * Constructeur de la classe
    * @param string $path Chemin vers le template
    */
    public function __construct(string $template){
        $this->template = $template;
    }

    /**
     * Redéfini le path
     * @param string $template Chemin vers le template
     * @return void
     */
    public function setPath(string $template){
        $this->template = $template;
    }

    /**
    * Affiche le template
    * @param string $chemin Chemin vers le fichier à inclure
    */
    public function render(string $path): string{
        if (file_exists($path)) {
            ob_start();
            require $path;
            $content = ob_get_clean();        
        } else {
            $content = "Le fichier n'existe pas";
        }
        require $this->template;
        return $content;
    }

}