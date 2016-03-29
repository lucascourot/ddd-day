<?php

namespace spec\Domain\Post;

use Domain\Comment\Comment;
use Domain\Post\PostId;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PostSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(PostId::generate());
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Domain\Post\Post');
    }

    function it_comments(Comment $comment)
    {
        $this->getComments()->shouldHaveCount(0);
        $this->comment($comment);
        $this->getComments()->shouldHaveCount(1);
    }
}
