Feature: Gist To PDF
  In order to read a gist in PDF form
  As a reader
  I want to create a PDF from a gist uri
  
  Scenario: Create PDF from gist uri
    Given there is a gist located at "https://gist.github.com/petemcfarlane/a84f968a5356f9bfffeb"
    When I convert the gist to PDF
    Then I should create and download a PDF file