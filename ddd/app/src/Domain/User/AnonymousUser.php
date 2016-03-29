<?php

namespace Domain\User;

class AnonymousUser
{
    private function __construct() {}

    public static function connect()
    {
        $anonymousUser = new AnonymousUser();

        return $anonymousUser;
    }
}
