<?php

/**
* Class Autoloader
* @package classes
*/
class Autoloader{

    /**
     * Enregistre notre autoloader
     */
    static function register(){
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }

    /**
     * Inclue le fichier correspondant à notre classe
     * @param $class string Le nom de la classe à charger
     */
    static function autoload($fqcn){
        $path = str_replace('\\', '/', $fqcn);
        $file = dirname(__FILE__) . '/' . $path . '.php';
        if (file_exists($file)) {
            require_once($file);
        }
    }

}