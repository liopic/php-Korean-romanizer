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

    public function matchesAt(JamoList $jamoList, $key)
    {
        $copy = clone($jamoList);
        while ($copy->key() != $key) {
            $copy->next();
        }
        $this->jamos->rewind();
        $size = min($this->jamos->count(), $copy->count());
        while ($size--) {
            if ($copy->current() != $this->jamos->current()) {
                return false;
            }
            $copy->next();
            $this->jamos->next();
        }
        return true;
    }

    public function applyAt(JamoList $jamoList, $key)
    {
        if (!$this->matchesAt($jamoList, $key)) {
            return "";
        }
        $shift = $this->jamos->count()-1;
        while ($shift--) {
            $jamoList->next();
        }
        return $this->romanization;
    }

    public function __toString()
    {
        return $this->jamos.'->'.$this->romanization;
    }
}
