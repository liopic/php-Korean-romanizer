<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;

use KoreanRomanizer\Romanizer;

class FeatureContext implements Context, SnippetAcceptingContext
{
    private $romanizer;
    private  $result;

    /**
     * @Given I have the word :word
     */
    public function iHaveTheWord($word)
    {
        $this->romanizer = new Romanizer($word);
    }

    /**
     * @When I run the romanization
     */
    public function iRunTheRomanization()
    {
        $this->result = $this->romanizer->romanize();
    }

    /**
     * @Then I should get :latin
     */
    public function iShouldGet($latin)
    {
        if ((string) $latin !== $this->result) {
            throw new Exception("Actual result is:\n" . $this->result);
        }
    }
}
