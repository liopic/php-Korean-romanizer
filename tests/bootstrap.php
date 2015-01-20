<?php
spl_autoload_register(
    function ($class) {
        if(!strstr($class, "KoreanRomanizer")){
            return false;
        }
        $class = str_replace('\\', '/', $class);
        if (file_exists('src/'.$class.'.php')) {
            include_once 'src/'.$class.'.php';
        } else {
            include_once '../src/'.$class.'.php';
        }
    }
);
