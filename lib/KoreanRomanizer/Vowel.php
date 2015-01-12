<?php
namespace KoreanRomanizer;

/**
 * Jamo (Korean letter) vowel
 */
class Vowel extends Jamo
{
    const FIRST_KOREAN_VOWEL = 12623; //ㅏ, Unicode 0x314f
    const LAST_KOREAN_VOWEL  = 12643; //ㅣ, Unicode 0x3163

    /**
     * Create a vowel jamo instance
     * @param string $letter UTF-8 letter
     * @throws \KoreanRomanizer\InvalidArgumentException
     */
    public function __construct($letter)
    {
        parent::__construct($letter);
        if (!$this->isKoreanVowel()) {
            throw new InvalidArgumentException(
                "The parameter of ".__CLASS__." must be an UTF-8 Korean vowel character."
            );
        }
    }

    private function isKoreanVowel()
    {
        $dec = $this->getUnicodeIndex();
        return $dec >= self::FIRST_KOREAN_VOWEL
            && $dec <= self::LAST_KOREAN_VOWEL;
    }

    public function romanize()
    {
        return "AAA";
    }
}
