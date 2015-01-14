<?php
namespace KoreanRomanizer;

/**
 * Jamo (a Korean letter)
 */
abstract class Jamo extends UnicodeChar
{
    /**
     * Check if the instance's char is among allowed chars
     * @return bool
     */
    protected function isAllowedChar()
    {
        $allowed = $this->getAllowedChars();
        return in_array($this->char, $allowed);
    }

    /**
     * Returns an array of UTF8 Korean letters that are allowed in Jamo's child class
     * @return array
     */
    abstract public function getAllowedChars();
}
