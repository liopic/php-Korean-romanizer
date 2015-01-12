<?php
namespace KoreanRomanizer;

/**
 * Jamo (Korean letter) consonant
 */
class Consonant extends Jamo
{
    const FIRST_KOREAN_CONSONANT = 12593; //ㄱ, Unicode 0x3131
    const LAST_KOREAN_CONSONANT  = 12622; //ㅎ, Unicode 0x314e

    /**
     * Create a consonant jamo instance
     * @param string $letter UTF-8 letter
     * @throws \KoreanRomanizer\InvalidArgumentException
     */
    public function __construct($letter)
    {
        parent::__construct($letter);
        if (!$this->isKoreanConsonant()) {
            throw new InvalidArgumentException(
                "The parameter of ".__CLASS__." must be an UTF-8 Korean vowel character."
            );
        }
    }

    private function isKoreanConsonant()
    {
        $dec = $this->getUnicodeIndex();
        return $dec >= self::FIRST_KOREAN_CONSONANT
            && $dec <= self::LAST_KOREAN_CONSONANT;
    }

    public function romanize()
    {
        return "CCC";
    }
}
