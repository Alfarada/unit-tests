<?php

namespace Styde\Stubs;

use Styde\AuthenticatorInterface;
use Styde\User;

class AuthenticatorStub implements AuthenticatorInterface
{
    public function check(): bool
    {
        return true;
    }

    public function user(): User
    {
        return new User([
            'role' => 'admin'
        ]);
    }
}
