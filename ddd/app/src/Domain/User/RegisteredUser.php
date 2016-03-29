<?php

namespace Domain\User;

class RegisteredUser
{
    private $registeredUserId;
    private $username;
    private $password;

    private function __construct(RegisteredUserId $registeredUserId, $username, $password = null) {
        $this->registeredUserId = $registeredUserId;
        $this->username = $username;
        $this->password = $password;
    }

    public static function fromUsername(RegisteredUserId $registeredUserId, $username)
    {
        $registeredUser = new self($registeredUserId, $username);

        return $registeredUser;
    }

    public static function registerFromAnonymous(
        RegisteredUserId $registeredUserId, AnonymousUser $anonymousUser, $username, $password
    ) {
        $registeredUser = new self($registeredUserId, $username, $password);

        return $registeredUser;
    }

    public function getUsername()
    {
        return $this->username;
    }
}
