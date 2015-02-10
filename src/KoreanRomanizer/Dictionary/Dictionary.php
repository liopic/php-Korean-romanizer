<?php
namespace KoreanRomanizer\Dictionary;

/**
 * Container for instances of DictionaryEntry
 */
class Dictionary extends \SplObjectStorage
{
    public function attach($entry, $inf = null)
    {
        if ($entry instanceof DictionaryEntry) {
            parent::attach($entry);
        } else {
            throw new \KoreanRomanizer\InvalidArgumentException('Expected DictionaryEntry object!');
        }
    }

    public function detach($entry, $inf = null)
    {
        if ($entry instanceof DictionaryEntry) {
            parent::detach($entry);
        } else {
            throw new \KoreanRomanizer\InvalidArgumentException('Expected DictionaryEntry object!');
        }
    }

    /**
     * Translate in the given string using all stored entries
     * @param $s
     * @return string
     */
    public function translate($s)
    {
        $this->rewind();
        while ($this->valid()) {
            $current = $this->current();
            $s = $current->translate($s);
            $this->next();
        }
        return $s;
    }
}
