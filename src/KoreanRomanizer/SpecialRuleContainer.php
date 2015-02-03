<?php
namespace KoreanRomanizer;

/**
 * Container for Special Rules
 */
class SpecialRuleContainer extends \SplObjectStorage
{
    function attach($rule, $inf = null)
    {
        if ($rule instanceof SpecialRule) {
            parent::attach($rule);
        }
    }

    function detach($rule, $inf = null)
    {
        if ($rule instanceof SpecialRule) {
            parent::detach($rule);
        }
    }

    /**
    * finds a rule that matches the jamos from $jamoList at $key position
    * @param JamoList $jamoList
    * @param int $key
    */
    function findRuleAt(JamoList $jamoList, $key)
    {
        $rule = null;
        $this->rewind();
        while ($this->valid()) {
            $current = $this->current();
            if ($current->matchesAt($jamoList, $key)){
                $rule = $current;
                break;
            }
            $this->next();
        }
        return $rule;
    }
}
