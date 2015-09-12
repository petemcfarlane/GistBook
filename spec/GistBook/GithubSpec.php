<?php

namespace spec\GistBook;

use GistBook\Gist;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class GithubSpec extends ObjectBehavior
{
    function it_can_request_files_from_a_gist(Gist $gist)
    {
        $gist->getId()->willReturn('bb7628ad34c699392f9c');
        $this->requestFilesFromGist($gist)->shouldBeArray();
    }
}
