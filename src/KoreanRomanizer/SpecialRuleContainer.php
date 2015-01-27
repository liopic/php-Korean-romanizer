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
}
