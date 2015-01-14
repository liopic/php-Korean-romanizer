<?php
namespace KoreanRomanizer;

/**
 * Jamo (Korean letter) vowel
 */
class Vowel extends Jamo
{
    /**
     * Create a Korean vowel
     * @param string $letter UTF-8 Korean vowel
     * @throws \KoreanRomanizer\InvalidArgumentException
     */
    public function __construct($letter)
    {
        parent::__construct($letter);
        if (!$this->isAllowedChar()) {
            throw new InvalidArgumentException(
                "The parameter of ".__CLASS__." must be an UTF-8 Korean vowel."
            );
        }
    }

    /**
     * Returns an array of UTF8 Korean letters that are allowed as Korean vowel
     * @return array
     */
    public function getAllowedChars()
    {
        return ["ㅏ", "ㅐ", "ㅑ", "ㅒ", "ㅓ", "ㅔ", "ㅕ", "ㅖ", "ㅗ", "ㅘ",
            "ㅙ", "ㅚ", "ㅛ", "ㅜ", "ㅝ", "ㅞ", "ㅟ", "ㅠ", "ㅡ", "ㅢ", "ㅣ"];
    }

    public function romanize()
    {
        return "AAA";
    }
}
