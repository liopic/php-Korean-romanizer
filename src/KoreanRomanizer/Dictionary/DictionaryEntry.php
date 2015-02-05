<?php
namespace KoreanRomanizer\Dictionary;

/**
* DictionaryEntry
*/
class DictionaryEntry
{
    const REGEX = true;
    const NOREGEX = false;

    /**
     * The original text
     */
    protected $original;
    /**
    * The translated text
    */
    protected $translation;

    /**
    * If the original is a regex
    */
    protected $regex;

    /**
     * Create a dictionary entry
     * @param string $original
     * @param string $translation
     * @throws \KoreanRomanizer\InvalidArgumentException
     */
    public function __construct($original, $translation, $regex = self::NOREGEX)
    {
        if (!is_string($original) || !is_string($translation)) {
            throw new \KoreanRomanizer\InvalidArgumentException("The 1st and 2nd parameters of ".__CLASS__." must be strings.");
        } elseif (!is_bool($regex)) {
            throw new \KoreanRomanizer\InvalidArgumentException("The 3rd parameter of ".__CLASS__." must be a boolean.");
        }
        $this->original = $original;
        $this->translation = $translation;
        $this->regex = $regex;
    }

    /**
     * Translate in the given string
     * @param $s
     * @return string
     */
    public function translate($s)
    {
        if ($this->regex === self::REGEX) {
            return mb_ereg_replace($this->original, $this->translation, $s);
        } else {
            return str_replace($this->original, $this->translation, $s);
        }
    }
}
