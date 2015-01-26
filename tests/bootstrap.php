<?php
spl_autoload_register(
    function ($class) {
        if(!strstr($class, "KoreanRomanizer")){
            return false;
        }
        $class = str_replace('\\', '/', $class);
        include_once 'src/'.$class.'.php';
    }
);
