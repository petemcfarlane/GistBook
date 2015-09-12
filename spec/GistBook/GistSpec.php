<?php

namespace spec\GistBook;

use InvalidArgumentException;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class GistSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->beConstructedFromUri('https://gist.github.com/petemcfarlane/a84f968a5356f9bfffeb');
    }

    function it_should_complain_if_not_constructed_with_a_valid_uri()
    {
        $this->beConstructedFromUri(' ');
        $this->shouldThrow(InvalidArgumentException::class)->duringInstantiation();
    }
}
