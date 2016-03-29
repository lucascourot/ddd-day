<?php

namespace spec\Domain\Comment;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class AuthorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Domain\Comment\Author');
    }

    function let()
    {
        $this->beConstructedThrough('named', ['Lucas']);
    }

    function it_has_a_name()
    {
        $this->getName()->shouldNotBe(null);
    }
}
