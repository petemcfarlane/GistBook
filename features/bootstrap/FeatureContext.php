<?php

use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use GistBook\Gist;
use GistBook\Pdf;

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
        Pdf::fromGist($this->gist);
    }

    /**
     * @Then /^I should create and download a PDF file$/
     */
    public function iShouldCreateAndDownloadAPDFFile()
    {
        foreach ($this->gist->files() as $file) {
            $filename = rtrim($file['filename'], '.pdf') . '.pdf';
            if (!file_exists($filename)) {
                throw new Exception("File {$filename} was not found in " . getcwd());
            }
            // verified file exists, now clean up the file
            unlink($filename);
        }
    }
}
