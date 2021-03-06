<?php

namespace Styde;

use Styde\Authenticator as Auth;

class AccessHandler
{   
    protected $auth;

    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }

    public function check($role): bool
    {
        return $this->auth->check() && $this->auth->user()->role === $role;
    }

}