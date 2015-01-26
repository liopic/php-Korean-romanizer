<?php

use KoreanRomanizer\Romanizer;

class RomanizerTest extends PHPUnit_Framework_TestCase
{
    /**
    * @dataProvider examplesTestRomanize
    */
    public function testRomanizeCommonCases($sIn, $sOut)
    {
        $s = new Romanizer($sIn);
        $this->assertEquals($sOut, $s->romanize());
    }

    public function examplesTestRomanize()
    {
        //Basic Korean words without special cases
        $basic = [
            ["나비",    "nabi"],
            ["두부",    "dubu"],
            ["사랑해",  "saranghae"],
            ["안녕",    "annyeong"],
            ["고마워요","gomawoyo"],
            ["커피",    "keopi"]
        ];

        //Mixed with non-Korean chars
        $mix = [
            ["신촌역 4번출구", "sinchonyeok 4beonchulgu"],
            ["북한 1 - 한국 2", "bukhan 1 - hanguk 2"]
        ];

        return array_merge($basic, $mix);
    }
}
