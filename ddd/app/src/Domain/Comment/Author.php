<?php

namespace Domain\Comment;

class Author
{
    private $name;

    private function __construct($name)
    {
        $this->name = $name;
    }

    public static function named($name)
    {
        $author = new self($name);

        return $author;
    }

    public function getName()
    {
        return $this->name;
    }
}
