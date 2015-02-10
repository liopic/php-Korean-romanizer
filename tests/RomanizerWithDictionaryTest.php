<?php

use KoreanRomanizer\Romanizer;
use KoreanRomanizer\Dictionary\Dictionary;
use KoreanRomanizer\Dictionary\DictionaryEntry;

class RomanizerWithDictionaryTest extends PHPUnit_Framework_TestCase
{
    /**
    * @dataProvider examplesTestRomanize
    */
    public function testRomanizeWithDictionary($sIn, $sOut)
    {
        $rom = new Romanizer($sIn);
        $dict = new Dictionary();
        $dict->attach(new DictionaryEntry("시청", "City Hall"));
        //$dict->attach(new DictionaryEntry('(.)대통령', 'President \\1', DictionaryEntry::REGEX));
        $rom->setDictionary($dict);
        $this->assertEquals($sOut, $rom->romanize());
    }

    public function examplesTestRomanize()
    {
        $tests = [
            ["시청 4번출구", "City Hall 4beonchulgu"]
        //    ["조대통령", "President jo"]
        ];

        return $tests;
    }
}
