<?php

namespace Domain\Comment;

class Comment
{
    private $commentId;
    /**
     * @var Author
     */
    private $author;
    private $message;

    public function __construct(CommentId $commentId, Author $author, $message) {
        $this->commentId = $commentId;
        $this->author = $author;
        $this->message = $message;
    }

    /**
     * @return Author
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }
}
