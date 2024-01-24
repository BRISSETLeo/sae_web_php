<?php

namespace classes;

class Templates{

    private string $path;

    public function __construct(string $path){
        $this->path = $path;
    }

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