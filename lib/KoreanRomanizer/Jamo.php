<?php
namespace KoreanRomanizer;

/**
 * Jamo (a Korean letter)
 */
class Jamo extends UnicodeChar
{
    /**
     * Create a Jamo instance
     * @param string $letter UTF-8 letter
     * @throws \KoreanRomanizer\InvalidArgumentException
     */
    public function __construct($letter)
    {
        if (!self::isAllowedChar($letter)) {
            throw new InvalidArgumentException("The parameter of ".__CLASS__." must be a allowed Jamo character.");
        }
        $this->char = $letter;
    }
    /**
     * Check if a caracter is among allowed chars
     * @param char $char the caracter to test
     * @return bool
     */
    public static function isAllowedChar($char)
    {
        $allowed = static::getAllowedChars();
        return in_array($char, $allowed);
    }

    /**
     * Returns an array of UTF8 Korean letters that are allowed for instanciating the class
     * @return array
     */
    public static function getAllowedChars()
    {
        $consonants = ["㄰", "ㄱ", "ㄲ", "ㄳ", "ㄴ", "ㄵ", "ㄶ", "ㄷ", "ㄹ", "ㄺ",
            "ㄻ", "ㄼ", "ㄽ", "ㄾ", "ㄿ", "ㅀ", "ㅁ", "ㅂ", "ㅄ", "ㅅ",
            "ㅆ", "ㅇ", "ㅈ", "ㅊ", "ㅋ", "ㅌ", "ㅍ", "ㅎ"];
        $vowels = ["ㅏ", "ㅐ", "ㅑ", "ㅒ", "ㅓ", "ㅔ", "ㅕ", "ㅖ", "ㅗ", "ㅘ",
            "ㅙ", "ㅚ", "ㅛ", "ㅜ", "ㅝ", "ㅞ", "ㅟ", "ㅠ", "ㅡ", "ㅢ", "ㅣ"];
        return array_merge($consonants, $vowels);
    }
}
