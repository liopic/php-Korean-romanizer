<?php

use KoreanRomanizer\Romanizer;

class SpecialCasesTest extends PHPUnit_Framework_TestCase
{
    /**
    * @dataProvider examplesFromFiles
    */
    public function testRomanizeSpecialCases($sIn, $sOut)
    {
        $s = new Romanizer($sIn);
        $this->assertEquals(strtolower($sOut), $s->romanize());
    }

    public function examplesFromFiles()
    {
        include_once "romanizationExamples.php";
        $examples = array_reduce($romanizationExamples, 'array_merge', []);
        unset($romanizationExamples);

        include_once "seoulSubwayExamples.php";
        $examples = array_merge($examples, array_reduce($seoulLines, 'array_merge', []));

        foreach ($examples as $k => $v) {
            if (isset($v[2])) {
                unset($examples[$k]);
            }
        }
        return $examples;
    }
}
