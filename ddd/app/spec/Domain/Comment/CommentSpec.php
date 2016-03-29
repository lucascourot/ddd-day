<?php

namespace spec\Domain\Comment;

use Domain\Comment\Author;
use Domain\Comment\CommentId;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CommentSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(CommentId::generate(), Author::named('Lucas'), 'test');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Domain\Comment\Comment');
    }

    function it_has_an_author_and_a_message()
    {
        $this->getAuthor()->shouldBeLike(Author::named('Lucas'));
        $this->getMessage()->shouldBe('test');
    }
}
