<?php

use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Behat\Tester\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context, SnippetAcceptingContext
{
    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
    }

    /**
     * @Given /^there is a gist located at "([^"]*)"$/
     */
    public function thereIsAGistLocatedAt($uri)
    {
        throw new PendingException();
    }

    /**
     * @When /^I convert the gist to PDF$/
     */
    public function iConvertTheGistToPDF()
    {
        throw new PendingException();
    }

    /**
     * @Then /^I should create and download a PDF file$/
     */
    public function iShouldCreateAndDownloadAPDFFile()
    {
        throw new PendingException();
    }
}
