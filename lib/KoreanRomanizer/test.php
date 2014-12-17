<?php
include "Syllabe.php";
use KoreanRomanizer\Syllabe;

$s = new Syllabe("륡");
echo $s->romanize();


/*
var_dump("가",mb_strlen("가","UTF-8"),strlen("가"));
var_dump("힣",mb_strlen("힣","UTF-8"),strlen("힣"));

var_dump(mb_detect_encoding("가"));
var_dump(bin2hex("가"));

echo "----\n";
$s = mb_convert_encoding("가","UCS2","UTF-8");
var_dump(bin2hex($s));
var_dump(hexdec(bin2hex($s)));

echo "----\n";

$s = mb_convert_encoding("힣","UCS2","UTF-8");
var_dump(bin2hex($s));
var_dump(hexdec(bin2hex($s)));
*/
