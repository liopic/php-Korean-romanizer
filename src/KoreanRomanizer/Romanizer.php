<?php
namespace KoreanRomanizer;

class Romanizer implements RomanizeInterface
{
    /**
     * @var string sentence
     */
    private $s;

    /**
     * Create a word or sentence instance
     * @param string $s UTF-8 string with hangul to romanize
     * @throws \KoreanRomanizer\InvalidArgumentException
     */
    public function __construct($s)
    {
        if (mb_detect_encoding($s, 'UTF-8') != "UTF-8") {
            throw new InvalidArgumentException("The parameter of Romanizer must be a UTF-8 string.");
        }
        $this->s = $s;
    }

    /**
     * Returns the romanization
     * @return string
     */
    public function romanize()
    {
        mb_internal_encoding("UTF-8");

        //Extract utf8 chars one by one, creating a Syllabe object for each char
        $syllabes = [];
        $s = $this->s;
        $strlen = mb_strlen($s);
        while ($strlen) {
            $syllabes[] = new Syllabe(mb_substr($s, 0, 1));
            $s = mb_substr($s, 1);
            $strlen = mb_strlen($s);
        }

        //Get the jamos of each syllabe
        $jamoList = new JamoList();
        foreach ($syllabes as $syllabe) {
            $jamoList->addAll($syllabe->getJamos());
        }

        $rom = [];
        foreach($jamoList as $j){
            $rom[] = $j->romanize();
        }

        return implode($rom);
    }
}
