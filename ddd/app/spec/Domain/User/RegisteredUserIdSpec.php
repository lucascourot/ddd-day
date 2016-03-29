<?php

namespace spec\Domain\User;

use Domain\User\RegisteredUserId;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Ramsey\Uuid\Uuid;

class RegisteredUserIdSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->beConstructedThrough('generate');
        $this->shouldHaveType('Domain\User\RegisteredUserId');
    }

    function it_creates_new_id_from_string()
    {
        $uuid4 = Uuid::uuid4();
        $this->beConstructedThrough('fromString', [$uuid4->toString()]);
        $this->toString()->shouldBe($uuid4->toString());
    }

    function it_compares_two_ids()
    {
        $uuid4 = Uuid::uuid4();
        $this->beConstructedThrough('fromString', [$uuid4->toString()]);
        $this->sameValueAs(RegisteredUserId::fromString($uuid4->toString()))->shouldBe(true);
    }
}
