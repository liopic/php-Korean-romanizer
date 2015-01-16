<?php
namespace KoreanRomanizer;

/**
* UnicodeChar
*/
class UnicodeChar
{
    /**
     * The char itself
     */
    protected $char;

    /**
     * Create a char instance
     * @param string $letter UTF-8 letter
     * @throws \KoreanRomanizer\InvalidArgumentException
     */
    public function __construct($letter)
    {
        if (!self::isOneUTF8Char($letter)) {
            throw new InvalidArgumentException("The parameter of ".__CLASS__." must be a single UTF-8 character.");
        }
        $this->char = $letter;
    }

    /**
     * Check if it's an UTF-8 1-char-long string
     * @param string $s UTF-8 letter
     * @throws \KoreanRomanizer\InvalidArgumentException
     */
    private static function isOneUTF8Char($s)
    {
        return mb_strlen($s, "UTF-8") == 1;
    }

    /**
     * Returns the unicode index of the character $s
     * @param string $s
     * @return integer
     */
    final public function getUnicodeIndex()
    {
        $long = mb_convert_encoding($this->char, "UCS2", "UTF-8");
        return hexdec(bin2hex($long));
    }

    public function __toString()
    {
        return $this->char;
    }
}
