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
        ['ㄱ', 'ㄹ', 'ngn'],
        ['ㄱ', 'ㅁ', 'ngm'],
        ['ㄴ', 'ㄱ', 'n-g'],
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
        ['ㅂ', 'ㅎ', 'p'],
        ['ㅅ', 'ㅇ', 's'],
        ['ㅅ', 'ㄴ', 'nn'],
        ['ㅅ', 'ㄹ', 'nn'],
        ['ㅅ', 'ㅁ', 'nm'],
        ['ㅇ', 'ㅇ', 'ng-'],
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
        ['ㅎ', 'ㅇ', 'k'],
        ['ㅎ', 'ㄱ', 'k'],
        ['ㅎ', 'ㄴ', 'nn'],
        ['ㅎ', 'ㄷ', 't'],
        ['ㅎ', 'ㄹ', 'nn'],
        ['ㅎ', 'ㅁ', 'nm'],
        ['ㅎ', 'ㅂ', 'p'],
        ['ㅎ', 'ㅈ', 'ch']
    ];

    // ending consonant + initial + vowel
    private static $endIniVow = [
        ['ㄴ', 'ㄹ', 'ㅗ', 'nno'],      //신문로->Sinmunno (instead of Sinmullo)
        ['ㄱ', 'ㅇ', 'ㅕ', 'ngnyeo'],   //학여울->Hangnyeoul
        ['ㄹ', 'ㅇ', 'ㅑ', 'llya']      //알약->Allyak
    ];

    public static function build()
    {
        $ruleContainer = new SpecialRuleContainer();

        //3-jamo rules: end + ini + vow
        foreach (self::$endIniVow as $rule) {
            $jamos = new JamoList();
            $jamos->attach(new EndConsonant($rule[0]));
            $jamos->attach(new IniConsonant($rule[1]));
            $jamos->attach(new Vowel($rule[2]));
            $rule = new SpecialRule($jamos, $rule[3]);
            $ruleContainer->attach($rule);
        }
        //2-jamo rules: end + ini
        foreach (self::$endIni as $rule) {
            $jamos = new JamoList();
            $jamos->attach(new EndConsonant($rule[0]));
            $jamos->attach(new IniConsonant($rule[1]));
            $rule = new SpecialRule($jamos, $rule[2]);
            $ruleContainer->attach($rule);
        }

        return $ruleContainer;
    }
}
