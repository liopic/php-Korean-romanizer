<?php
namespace KoreanRomanizer;

/**
 * Syllabe (a Korean block with 2 or more letters)
 */
class Syllabe extends UnicodeChar
{
    const FIRST_KOREAN_SYLLABE = 44032; //가, Unicode 0xAC00
    const LAST_KOREAN_SYLLABE  = 55203; //힣, Unicode 0xD7A3

    /**
     * @var Consonant initial consonant
     */
    private $iniConsonant;

    /**
     * @var Vowel vowel
     */
    private $vowel;

    /**
     * @var Consonant ending consonant
     */
    private $endConsonant;

    /**
     * @var bool Korean or not
     */
    private $isKoreanFlag;

    /**
     * Create a syllabe instance
     * @param string $s UTF-8 syllabe
     * @throws \KoreanRomanizer\InvalidArgumentException
     */
    public function __construct($s)
    {
        parent::__construct($s);
        $this->char = $s;
        $this->isKoreanFlag = $this->isKoreanSyllabe();
        if ($this->isKoreanFlag) {
            $this->splitJamo();
        }
    }

    /**
     * Tells if the object is a Korean syllabe
     * @return bool
     */
    public function isKorean()
    {
        return !!$this->isKoreanFlag;
    }

    /**
     * Tells if the char $s is a Korean Syllabe in UTF8
     * @param string $s
     * @return integer
     */
    private function isKoreanSyllabe()
    {
        $dec = $this->getUnicodeIndex();
        return $dec >= self::FIRST_KOREAN_SYLLABE
            && $dec <= self::LAST_KOREAN_SYLLABE;
    }

    /**
     * Extract the letters of the syllabe
     * @return string
     */
    public function splitJamo()
    {
        if (!$this->isKoreanFlag) {
            return false;
        }

        $base = $this->getUnicodeIndex() - self::FIRST_KOREAN_SYLLABE;

        //Extract ending consonant
        $finals = EndConsonant::getAllowedChars();
        $finalC = count($finals);
        $finalIndex = $base % $finalC;
        $this->endConsonant = new EndConsonant($finals[$finalIndex]);
        $base = ($base-$finalIndex) / $finalC;

        //Extract vowel
        $vowels = Vowel::getAllowedChars();
        $vowelC = count($vowels);
        $vowelIndex = $base % $vowelC;
        $this->vowel = new Vowel($vowels[$vowelIndex]);
        $base = ($base-$vowelIndex) / $vowelC;

        //Extract initial consonant
        $initials = IniConsonant::getAllowedChars();
        $initialC = count($initials);
        $initialIndex = $base % $initialC;
        $this->iniConsonant = new IniConsonant($initials[$initialIndex]);

        return true;
    }

    public function romanize()
    {
        if (!$this->isKoreanFlag) {
            return $this->char;
        } else {
            return $this->iniConsonant->romanize()
                .$this->vowel->romanize()
                .$this->endConsonant->romanize();
        }
    }
}
