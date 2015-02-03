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
        $syllabes[] =new Syllabe(" "); //add a fake end, to mark last Korean word ending

        //Get the jamos of each syllabe, grouping by Korean words
        $specialRules = SpecialRuleFactory::build();
        $jamoList = new JamoList();
        $rom = [];
        foreach ($syllabes as $syllabe) {
            if($syllabe->isKorean()) {
                $jamoList->addAll($syllabe->getJamos());
            } else {
                //first process stored Korean word
                $rom[] = $this->romanizeWord($jamoList, $specialRules);
                unset($jamoList);
                $jamoList = new JamoList();
                //and then process the non Korean char
                $rom[] = $syllabe->romanize();
            }
        }
        array_pop($rom); //remove the fake end
        return implode($rom);
    }

    /**
    * romanize a word, using its $jamos and applying $specialRules
    * @return string
    */
    private function romanizeWord(JamoList $jamoList, SpecialRuleContainer $specialRules)
    {
        // Apply romanization, first checking for special rules that start with an EndConsonant
        $rom = [];
        foreach($jamoList as $k => $j){
            if ($j instanceof EndConsonant) {
                $rule = $specialRules->findRuleAt($jamoList, $k);
                if ($rule) {
                    $rom[] = $rule->applyAt($jamoList, $k);
                    continue;
                }
            }
            $rom[] = $j->romanize();
        }
        return implode($rom);
    }
}
