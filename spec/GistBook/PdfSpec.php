<?php

namespace spec\GistBook;

use GistBook\Gist;
use GistBook\Pdf;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PdfSpec extends ObjectBehavior
{
    function it_should_create_pdf_files_from_a_given_gist(Gist $gist)
    {
        $gist->files()->willReturn(
            [
                [
                    'filename' => 'foo',
                    'content' => '<h1>bar</h1>'
                ]
            ]
        );
        $this->beConstructedFromGist($gist);
        $this->shouldHaveType(Pdf::class);
        expect(file_exists('foo.pdf'))->toBe(true);
    }

    function let()
    {
        $this->clean();
    }

    function letGo()
    {
        $this->clean();
    }

    function clean() {
        if (file_exists('foo.pdf')) {
            unlink('foo.pdf');
        }
    }
}
