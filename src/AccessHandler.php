<?php

namespace Styde;

class AccessHandler
{   
    protected $auth;

    public function __construct(AuthenticatorInterface $auth)
    {
        $this->auth = $auth;
    }

    public function check($role): bool
    {
        return $this->auth->check() && $this->auth->user()->role === $role;
    }

}