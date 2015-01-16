<?php
namespace KoreanRomanizer;

/**
 * Jamo (Korean letter) ending consonant
 */
class EndConsonant extends Jamo
{
    /**
     * Returns an array of UTF8 Korean letters that are allowed for instanciating the class
     * @return array
     */
    public static function getAllowedChars()
    {
        return ["㄰", "ㄱ", "ㄲ", "ㄳ", "ㄴ", "ㄵ", "ㄶ", "ㄷ", "ㄹ", "ㄺ",
            "ㄻ", "ㄼ", "ㄽ", "ㄾ", "ㄿ", "ㅀ", "ㅁ", "ㅂ", "ㅄ", "ㅅ",
            "ㅆ", "ㅇ", "ㅈ", "ㅊ", "ㅋ", "ㅌ", "ㅍ", "ㅎ"];
    }

    public function romanize()
    {
        $origin = self::getAllowedChars();
        $romanization = ["", "k", "k", "k", "n", "n", "n", "t", "l", "k",
            "m", "l", "l", "l", "l", "l", "m", "p", "p", "t",
            "t", "ng", "t", "t", "k", "t", "p", "t"];
        return $romanization[array_search($this->char, $origin)];
    }
}
