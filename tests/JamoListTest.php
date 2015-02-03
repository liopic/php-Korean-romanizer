<?php

use KoreanRomanizer\Jamo;
use KoreanRomanizer\Vowel;
use KoreanRomanizer\JamoList;

class JamoListTest extends PHPUnit_Framework_TestCase
{
    protected $jl;

    protected function setUp()
    {
        $this->jl = new JamoList();
    }


    public function testAddAndRemoveAJamoToList()
    {
        $j = new Vowel('ㅏ');
        $this->assertEquals(false, $this->jl->contains($j));
        $this->jl->attach($j);
        $this->assertEquals(true, $this->jl->contains($j));
        $this->jl->detach($j);
        $this->assertEquals(false, $this->jl->contains($j));
    }

    public function testConvertToString()
    {
        $j1 = new Vowel('ㅏ');
        $j2 = new Vowel('ㅜ');
        $this->jl->attach($j1);
        $this->jl->attach($j2);
        $this->assertEquals('ㅏㅜ', $this->jl.'');
    }
}
