<?php
namespace KoreanRomanizer;

/**
 * Special Rule Factory
 * Builds
 */
class SpecialRuleFactory
{
    // ending consonant + initial consonant
    private static $endIni = [
        ['ㄱ', 'ㅇ', 'g'],
        ['ㄱ', 'ㄴ', 'ngn'],
        ['ㄱ', 'ㅁ', 'ngm'],
        ['ㄴ', 'ㄹ', 'll'],
        ['ㄷ', 'ㅇ', 'j'],
        ['ㄷ', 'ㄴ', 'nn'],
        ['ㄷ', 'ㄹ', 'nn'],
        ['ㄷ', 'ㅁ', 'nm'],
        ['ㄹ', 'ㅇ', 'r'],
        ['ㄹ', 'ㄴ', 'll'],
        ['ㄹ', 'ㄹ', 'll'],
        ['ㅂ', 'ㅇ', 'b'],
        ['ㅂ', 'ㄴ', 'mn'],
        ['ㅂ', 'ㄹ', 'mn'],
        ['ㅂ', 'ㅁ', 'mm'],
        ['ㅅ', 'ㅇ', 's'],
        ['ㅅ', 'ㄴ', 'nn'],
        ['ㅅ', 'ㄹ', 'nn'],
        ['ㅅ', 'ㅁ', 'nm'],
        ['ㅇ', 'ㄹ', 'ngn'],
        ['ㅈ', 'ㅇ', 'j'],
        ['ㅈ', 'ㄴ', 'nn'],
        ['ㅈ', 'ㄹ', 'nn'],
        ['ㅈ', 'ㅁ', 'nm'],
        ['ㅈ', 'ㅎ', 'ch'],
        ['ㅊ', 'ㅇ', 'ch'],
        ['ㅊ', 'ㄴ', 'nn'],
        ['ㅊ', 'ㄹ', 'nn'],
        ['ㅊ', 'ㅁ', 'nm'],
        ['ㅌ', 'ㅇ', 'ch'],
        ['ㅌ', 'ㄴ', 'nn'],
        ['ㅌ', 'ㄹ', 'nn'],
        ['ㅌ', 'ㅁ', 'nm'],
        ['ㅌ', 'ㅎ', 'ch'],
        ['ㅎ', 'ㅇ', 'h'],
        ['ㅎ', 'ㄴ', 'nn'],
        ['ㅎ', 'ㄹ', 'nn'],
        ['ㅎ', 'ㅁ', 'nm']
    ];

    // ending consonant + initial + vowel (case ㄴ+로)
    private static $endIniVow = [
        ['ㄴ', 'ㄹ', 'ㅗ', 'nno']
    ];

    public static function build()
    {
        $ruleContainer = new SpecialRuleContainer();

        //end + ini rules
        foreach (self::$endIni as $rule) {
            $jamos = new JamoList();
            $jamos->attach(new EndConsonant($rule[0]));
            $jamos->attach(new IniConsonant($rule[1]));
            $rule = new SpecialRule($jamos, $rule[2]);
            $ruleContainer->attach($rule);
        }

        //end + ini +vow rules
        foreach (self::$endIniVow as $rule) {
            $jamos = new JamoList();
            $jamos->attach(new EndConsonant($rule[0]));
            $jamos->attach(new IniConsonant($rule[1]));
            $jamos->attach(new Vowel($rule[2]));
            $rule = new SpecialRule($jamos, $rule[3]);
            $ruleContainer->attach($rule);
        }
        return $ruleContainer;
    }
}
