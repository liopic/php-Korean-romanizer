<?php
namespace KoreanRomanizer;

class Syllabe
{
    const FIRST_KOREAN_SYLLABE = 44032; //가, Unicode 0xAC00
    const LAST_KOREAN_SYLLABE  = 55203; //힣, Unicode 0xD7A3

    /**
     * @var string sillabe
     */
    private $char;

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
        //Should be only an UTF-8 hangul syllabe
        if (mb_strlen($s, "UTF-8") != 1) {
            throw new InvalidArgumentException("The parameter of Syllabe must be a single UTF-8 character.");
        }
        $this->char = $s;
        $this->isKoreanFlag = self::isKoreanUTF8($s);
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
     * Returns the unicode index of the character $s
     * @param string $s
     * @return integer
     */
    protected static function getUnicodeIndex($s)
    {
        $long = mb_convert_encoding($s, "UCS2", "UTF-8");
        return hexdec(bin2hex($long));
    }

    /**
     * Protected method to tell if the char $s is a Korean Syllabe in UTF8
     * @param string $s
     * @return integer
     */
    protected static function isKoreanUTF8($s)
    {
        $dec = self::getUnicodeIndex($s);
        return $dec >= self::FIRST_KOREAN_SYLLABE
            && $dec <= self::LAST_KOREAN_SYLLABE;
    }

    /**
     * Returns the romanization of the syllabe
     * @return string
     */
    public function romanize()
    {
        if (!$this->isKoreanFlag) {
            return $this->char;
        }

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
