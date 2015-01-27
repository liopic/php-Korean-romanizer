<?php
namespace KoreanRomanizer;

/**
 * Special Rule
 * It contains an special rule to romanize Korean.
 * For example, and ending ㄱ(k) + initial ㅇ(no sound) is romanized as "g"
 */
class SpecialRule
{
    /**
    * individual jamos to be romanized
    */
    private $jamos;

    /**
    * romanization of the jamos
    */
    private $romanization;

    /**
    * Construct
    * @param JamoList $jamos
    * @param string $romanization
    */
    public function __construct(JamoList $jamos, $romanization)
    {
        $this->jamos = $jamos;
        $this->romanization = $romanization;
    }

    public function __toString()
    {
        return $this->jamos.'->'.$this->romanization;
    }
}
