<?php

use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Behat\Tester\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use GistBook\Gist;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context, SnippetAcceptingContext
{
    /**
     * @var Gist
     */
    private $gist;

    /**
     * @Given /^there is a gist located at "([^"]*)"$/
     */
    public function thereIsAGistLocatedAt($uri)
    {
        $this->gist = Gist::fromUri($uri);
    }

    /**
     * @When /^I convert the gist to PDF$/
     */
    public function iConvertTheGistToPDF()
    {
        $this->gist->convertToPdf();
    }

    /**
     * @Then /^I should create and download a PDF file$/
     */
    public function iShouldCreateAndDownloadAPDFFile()
    {
        if (!file_exists('~/Downloads/' . $this->gist->fileName)) {
            throw new Exception("File {$this->gist->fileName} was not found in ~/Downloads/");
        }
    }
}
