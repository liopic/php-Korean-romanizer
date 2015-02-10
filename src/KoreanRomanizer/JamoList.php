<?php
namespace KoreanRomanizer;

/**
 * Container for Jamos
 */
class JamoList extends \SplObjectStorage
{
    public function attach($rule, $inf = null)
    {
        if ($rule instanceof Jamo) {
            parent::attach($rule);
        } else {
            throw new InvalidArgumentException('Expected Jamo object!');
        }
    }

    public function detach($rule, $inf = null)
    {
        if ($rule instanceof Jamo) {
            parent::detach($rule);
        } else {
            throw new InvalidArgumentException('Expected Jamo object!');
        }
    }

    public function __toString()
    {
        $s = "";
        foreach ($this as $j) {
            $s .= $j; //as string
        }
        return $s;
    }
}
