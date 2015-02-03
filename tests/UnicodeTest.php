<?php

use KoreanRomanizer\UnicodeChar;

class UnicodeTest extends PHPUnit_Framework_TestCase
{
    /**
     * @expectedException InvalidArgumentException
     */
    public function testNoOneChar()
    {
        $t = new UnicodeChar('12');
    }

    public function testNormalChar()
    {
        $c = new UnicodeChar('ñ');
        $this->assertEquals('ñ', $c->__toString());
    }

    public function testGetUnicodeIndex()
    {
        $c = new UnicodeChar('ᄑ'); //Unicode 0x1111, 4369
        $this->assertEquals(0x1111, $c->getUnicodeIndex());
    }
}
