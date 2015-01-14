<?php
namespace KoreanRomanizer;

/**
 * Jamo (Korean letter) ending consonant
 */
class EndConsonant extends Jamo
{
    /**
     * Create a ending consonant instance
     * @param string $letter UTF-8 Korean consonant
     * @throws \KoreanRomanizer\InvalidArgumentException
     */
    public function __construct($letter)
    {
        parent::__construct($letter);
        if (!$this->isAllowedChar()) {
            throw new InvalidArgumentException(
                "The parameter of ".__CLASS__." must be an UTF-8 Korean ending consonant."
            );
        }
    }

    /**
     * Returns an array of UTF8 Korean letters that are allowed as ending consonant
     * @return array
     */
    public function getAllowedChars()
    {
        return ["㄰", "ㄱ", "ㄲ", "ㄳ", "ㄴ", "ㄵ", "ㄶ", "ㄷ", "ㄹ", "ㄺ",
            "ㄻ", "ㄼ", "ㄽ", "ㄾ", "ㄿ", "ㅀ", "ㅁ", "ㅂ", "ㅄ", "ㅅ",
            "ㅆ", "ㅇ", "ㅈ", "ㅊ", "ㅋ", "ㅌ", "ㅍ", "ㅎ"];
    }

    public function romanize()
    {
        return "CCC";
    }
}
