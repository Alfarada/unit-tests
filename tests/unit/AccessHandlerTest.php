<?php

namespace Test;

use PHPUnit\Framework\TestCase;
use Styde\AccessHandler as Access;
use Styde\Authenticator as Auth;
use Styde\SessionFileDriver as Driver;
use Styde\SessionManager as Session;

class AccessHandlerTest extends TestCase
{

    public function test_grant_access()
    {   
        $driver = new Driver();
        $session = new Session($driver);
        $auth = new Auth($session);
        $access = new Access($auth);

        $this->assertTrue(
            $access->check('admin')
        );
    }

    public function test_deny_access()
    {
        $driver = new Driver();
        $session = new Session($driver);
        $auth = new Auth($session);
        $access = new Access($auth);

        $this->assertFalse(
            $access->check('editor')
        );
    }

}