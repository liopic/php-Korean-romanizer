<?php
namespace KoreanRomanizer;

/**
 * Jamo (Korean letter) initial consonant
 */
class IniConsonant extends Jamo
{
    /**
     * Create a initial consonant instance
     * @param string $letter UTF-8 Korean consonant
     * @throws \KoreanRomanizer\InvalidArgumentException
     */
    public function __construct($letter)
    {
        parent::__construct($letter);
        if (!$this->isAllowedChar()) {
            throw new InvalidArgumentException(
                "The parameter of ".__CLASS__." must be an UTF-8 Korean initial consonant."
            );
        }
    }

    /**
     * Returns an array of UTF8 Korean letters that are allowed as initial consonant
     * @return array
     */
    public function getAllowedChars()
    {
        return ["ㄱ", "ㄲ", "ㄴ", "ㄷ", "ㄸ", "ㄹ", "ㅁ", "ㅂ", "ㅃ", "ㅅ",
            "ㅆ", "ㅇ", "ㅈ", "ㅉ", "ㅊ", "ㅋ", "ㅌ", "ㅍ", "ㅎ"];
    }

    public function romanize()
    {
        return "CCC";
    }
}
