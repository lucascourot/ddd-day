<?php

namespace Domain\Post;

use Domain\Comment\Comment;

class Post
{
    /**
     * @var PostId
     */
    private $postId;
    private $comments;

    public function __construct(PostId $postId)
    {
        $this->postId = $postId;
        $this->comments = [];
    }

    public function comment(Comment $comment)
    {
        $this->comments[] = $comment;
    }

    public function getComments()
    {
        return $this->comments;
    }
}
