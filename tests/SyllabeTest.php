<?php

use KoreanRomanizer\Syllabe;

class SyllabeTest extends PHPUnit_Framework_TestCase
{
    /**
    * @dataProvider examplesTestRomanize
    */
    public function testRomanize($sIn, $sOut)
    {
        $s = new Syllabe($sIn);
        $this->assertEquals($sOut, $s->romanize());
    }

    public function examplesTestRomanize()
    {
        //Non Korean syllabes
        $non = [["a", "a"],
                ["午", "午"],
                ["д", "д"],
                ["😀","😀"]
        ];

        //Korean syllabes
        $kor = [["가", "ga"],
                ["힣", "hit"],
                ["한", "han"],
                ["글", "geul"],
                ["닭", "dak"]
        ];

        return array_merge($kor, $non);
    }
}
