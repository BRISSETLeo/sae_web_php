<?php

namespace classes;

class Template{

    private string $path;

    public function __construct(string $path){
        $this->path = $path;
    }

    public function render(string $contenant): string{
        ob_start();
        require $contenant;
        $content = ob_get_clean();
        require $this->path;
        return $content;
    }

}