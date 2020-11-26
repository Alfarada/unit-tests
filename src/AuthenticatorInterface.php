<?php

namespace Styde;

interface AuthenticatorInterface
{
    public function check(): bool;

    public function user(): User;

}