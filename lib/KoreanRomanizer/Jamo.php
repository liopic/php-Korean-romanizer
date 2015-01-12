<?php
namespace KoreanRomanizer;

/**
 * Jamo (a Korean letter)
 */
abstract class Jamo extends UnicodeChar
{
    const FIRST_KOREAN_JAMO = 12593; //ㄱ, Unicode 0x3131
    const LAST_KOREAN_JAMO  = 12643; //ㅣ, Unicode 0x3163

    /**
     * Create a jamo instance
     * @param string $letter UTF-8 letter
     * @throws \KoreanRomanizer\InvalidArgumentException
     */
    public function __construct($letter)
    {
        parent::__construct($letter);
        if (!$this->isKoreanJamo()) {
            throw new InvalidArgumentException(
                "The parameter of ".__CLASS__." must be an UTF-8 Korean jamo character."
            );
        }
    }

    private function isKoreanJamo()
    {
        $dec = $this->getUnicodeIndex();
        return $dec >= self::FIRST_KOREAN_JAMO
            && $dec <= self::LAST_KOREAN_JAMO;
    }

    abstract public function romanize();
}
