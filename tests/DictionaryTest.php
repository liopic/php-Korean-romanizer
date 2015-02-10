<?php

use KoreanRomanizer\Dictionary\Dictionary;
use KoreanRomanizer\Dictionary\DictionaryEntry;

class DictionaryTest extends PHPUnit_Framework_TestCase
{
    /**
     * @expectedException InvalidArgumentException
     */
    public function testNoCorrect12Params()
    {
        $d = new DictionaryEntry(1, 2);
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testNoCorrect3Param()
    {
        $d = new DictionaryEntry("a", "b", 1);
    }

    public function testRegexTranslation()
    {
        $s ='오 (1) 아이우';
        $pat = '오 \((.)\)';
        $translation = "oh[\\1]";
        $d = new DictionaryEntry($pat, $translation, DictionaryEntry::REGEX);
        $this->assertEquals('oh[1] 아이우', $d->translate($s));
    }

    public function testNoRegexTranslation()
    {
        $s ="오(1) 오아이우";
        $pat = "오";
        $translation = "oh";
        $d = new DictionaryEntry($pat, $translation);
        $this->assertEquals('oh(1) oh아이우', $d->translate($s));
    }

    public function testDictionaryTranslation()
    {
        $dict = new Dictionary();
        $dict->attach(new DictionaryEntry("123", "321"));
        $dict->attach(new DictionaryEntry("ab", "=AB="));
        $result = $dict->translate('123456,abcd,321');
        $this->assertEquals('321456,=AB=cd,321', $result);
    }
}
