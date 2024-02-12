<?php

namespace classes;

class Template{

    private string $path;

    public function __construct(string $path){
        $this->path = $path;
    }

    public function render(string $contenant, bool $identificationPage = false): string{
        ob_start();
        require $contenant;
        $content = ob_get_clean();
        if(!$identificationPage){
            require '_inc/vues/playlist.php';
            $playlist = ob_get_clean();
        }
        require $this->path;
        return $content;
    }

}