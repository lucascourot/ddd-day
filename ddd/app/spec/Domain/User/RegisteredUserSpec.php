<?php

namespace spec\Domain\User;

use Domain\User\AnonymousUser;
use Domain\User\RegisteredUserId;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class RegisteredUserSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Domain\User\RegisteredUser');
    }

    function it_registers_user_from_anonymous()
    {
        $this->beConstructedThrough('registerFromAnonymous', [RegisteredUserId::generate(), AnonymousUser::connect(), 'lucas', 'password']);
        $this->getUsername()->shouldBe('lucas');
    }

    function it_creates_user_from_username()
    {
        $this->beConstructedThrough('fromUsername', [RegisteredUserId::generate(), 'lucas']);
        $this->getUsername()->shouldBe('lucas');
    }
}
