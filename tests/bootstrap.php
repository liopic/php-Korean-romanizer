<?php
spl_autoload_register(
    function ($class) {
        if(!strstr($class, "KoreanRomanizer")){
            return false;
        }
        $class = str_replace('\\', '/', $class);
        if (file_exists('lib/'.$class.'.php')) {
            include_once 'lib/'.$class.'.php';
        } else {
            include_once '../lib/'.$class.'.php';
        }
    }
);
