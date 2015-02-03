<?php

use KoreanRomanizer\Syllabe;

class SyllabeTest extends PHPUnit_Framework_TestCase
{
    public function testNonKorean()
    {
        $s = new Syllabe(" ");
        $this->assertEquals(false, $s->isKorean());
        $this->assertEquals(" ", $s->romanize());
    }

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

    /**
    * Test for splitting Jamos and returning them
    */
    public function testSplittingJamos()
    {
        $s = new Syllabe("강");
        $jamos = $s->getJamos();
        $this->assertEquals("ㄱㅏㅇ", $jamos->__toString());
        $s = new Syllabe("옮");
        $jamos = $s->getJamos();
        $this->assertEquals("ㅇㅗㄻ", $jamos->__toString());
    }
}
