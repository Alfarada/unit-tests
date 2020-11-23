<?php

namespace Styde;

use Styde\SessionManager as Session;

class Authenticator
{
    protected $session;
    protected $user;

    public function __construct(Session $session)
    {
        $this->session = $session;
    }

    public function check()
    {
        return $this->user() != null;
    }

    public function user()
    {
        if ($this->user != null) {
            return $this->user;
        }

        $data = $this->session->get('user_data');

        if ( ! is_null($data)) {
            return $this->user = new User($data);
        }

        return null;
    }

} 