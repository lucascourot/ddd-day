<?php

namespace spec\Domain\User;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class AnonymousUserSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Domain\User\AnonymousUser');
    }

    function let()
    {
        $this->beConstructedThrough('connect');
    }
}
