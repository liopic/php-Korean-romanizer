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
        $this->splitJamo();
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
        $finals = ["", "ㄱ", "ㄲ", "ㄳ", "ㄴ", "ㄵ", "ㄶ", "ㄷ", "ㄹ", "ㄺ",
            "ㄻ", "ㄼ", "ㄽ", "ㄾ", "ㄿ", "ㅀ", "ㅁ", "ㅂ", "ㅄ", "ㅅ",
            "ㅆ", "ㅇ", "ㅈ", "ㅊ", "ㅋ", "ㅌ", "ㅍ", "ㅎ"];
        $finalC = count($finals);
        $finalIndex = $base % $finalC;
        $this->endConsonant = new Consonant($finals[$finalIndex]);
        $base = ($base-$finalIndex) / $finalC;

        //Extract vowel
        $vowels = ["ㅏ", "ㅐ", "ㅑ", "ㅒ", "ㅓ", "ㅔ", "ㅕ", "ㅖ", "ㅗ", "ㅘ",
            "ㅙ", "ㅚ", "ㅛ", "ㅜ", "ㅝ", "ㅞ", "ㅟ", "ㅠ", "ㅡ", "ㅢ", "ㅣ"];
        $vowelC = count($vowels);
        $vowelIndex = $base % $vowelC;
        $this->vowel = new Vowel($vowels[$vowelIndex]);
        $base = ($base-$vowelIndex) / $vowelC;

        //Extract initial consonant
        $initials = ["ㄱ", "ㄲ", "ㄴ", "ㄷ", "ㄸ", "ㄹ", "ㅁ", "ㅂ", "ㅃ", "ㅅ",
            "ㅆ", "ㅇ", "ㅈ", "ㅉ", "ㅊ", "ㅋ", "ㅌ", "ㅍ", "ㅎ"];
        $initialC = count($initial);
        $initialIndex = $base % $initialC;
        $this->iniConsonant = new Consonant($initials[$initialIndex]);

        return true;
    }

    public function romanize()
    {
        //initial consonant romanization
        // ["ㄱ", "ㄲ", "ㄴ", "ㄷ", "ㄸ", "ㄹ", "ㅁ", "ㅂ", "ㅃ", "ㅅ",
        //  "ㅆ", "ㅇ", "ㅈ", "ㅉ", "ㅊ", "ㅋ", "ㅌ", "ㅍ", "ㅎ"]
        $initial = ["g", "kk", "n", "d", "tt", "r", "m", "b", "pp", "s",
            "ss", "", "j", "jj", "ch", "k", "t", "p", "h"
        ];
        $initialC = count($initial);

        //vowels romanization
        // ["ㅏ", "ㅐ", "ㅑ", "ㅒ", "ㅓ", "ㅔ", "ㅕ", "ㅖ", "ㅗ", "ㅘ",
        //  "ㅙ", "ㅚ", "ㅛ", "ㅜ", "ㅝ", "ㅞ", "ㅟ", "ㅠ", "ㅡ", "ㅢ", "ㅣ"]
        $vowel = ["a", "ae", "ya", "yae", "eo", "e", "yeo", "ye", "o", "wa",
            "wae", "oe", "yo", "u", "wo", "we", "wi", "yu", "eu", "ui", "i"
        ];
        $vowelC = count($vowel);

        //final consonant romanization
        // ["", "ㄱ", "ㄲ", "ㄳ", "ㄴ", "ㄵ", "ㄶ", "ㄷ", "ㄹ", "ㄺ",
        //  "ㄻ", "ㄼ", "ㄽ", "ㄾ", "ㄿ", "ㅀ", "ㅁ", "ㅂ", "ㅄ", "ㅅ",
        //  "ㅆ", "ㅇ", "ㅈ", "ㅊ", "ㅋ", "ㅌ", "ㅍ", "ㅎ"]
        $final = ["", "k", "k", "k", "n", "n", "n", "t", "l", "k",
            "m", "l", "l", "l", "l", "l", "m", "p", "p", "t",
            "t", "ng", "t", "t", "k", "t", "p", "t"
        ];
        $finalC = count($final);

        $base = self::getUnicodeIndex($this->char) - self::FIRST_KOREAN_SYLLABE;
        $finalIndex = $base % $finalC;
        $base = ($base-$finalIndex) / $finalC;
        $vowelIndex = $base % $vowelC;
        $base = ($base-$vowelIndex) / $vowelC;
        $initialIndex = $base % $initialC;

        return $initial[$initialIndex] . $vowel[$vowelIndex] . $final[$finalIndex];
    }
}
