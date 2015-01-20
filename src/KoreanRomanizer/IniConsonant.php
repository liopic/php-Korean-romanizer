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
        $origin = self::getAllowedChars();
        $romanization = ["g", "kk", "n", "d", "tt", "r", "m", "b", "pp", "s",
            "ss", "", "j", "jj", "ch", "k", "t", "p", "h"];
        return $romanization[array_search($this->char, $origin)];
    }
}
