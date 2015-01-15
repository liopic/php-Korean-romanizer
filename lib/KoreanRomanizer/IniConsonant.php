<?php
namespace KoreanRomanizer;

/**
 * Jamo (Korean letter) initial consonant
 */
class IniConsonant extends Jamo
{
    /**
     * Returns an array of UTF8 Korean letters that are allowed for instanciating the class
     * @return array
     */
    public static function getAllowedChars()
    {
        return ["ㄱ", "ㄲ", "ㄴ", "ㄷ", "ㄸ", "ㄹ", "ㅁ", "ㅂ", "ㅃ", "ㅅ",
            "ㅆ", "ㅇ", "ㅈ", "ㅉ", "ㅊ", "ㅋ", "ㅌ", "ㅍ", "ㅎ"];
    }

    public function romanize()
    {
        return "CCC";
    }
}
