<?php

namespace Test;

use Mockery;
use PHPUnit\Framework\TestCase;
use Styde\{AccessHandler as Access, Authenticator, User};

class AccessHandlerTest extends TestCase
{   
    public function tearDown(): void
    {
        Mockery::close();
    }

    public function test_grant_access()
    {  
        $access = new Access($this->getAuthenticatorMock());

        $this->assertTrue(
            $access->check('admin')
        );
    }

    public function test_deny_access()
    {   
        $access = new Access($this->getAuthenticatorMock());

        $this->assertFalse(
            $access->check('editor')
        );
    }

    protected function getAuthenticatorMock()
    {
         
        $user = Mockery::mock(User::class);
        $user->role = 'admin';

        $auth = Mockery::mock(Authenticator::class);
        $auth->shouldReceive('check')
            ->once()
            ->andReturn(true);

        $auth->shouldReceive('user')
            ->once()
            ->andReturn($user);

        return $auth;
    }

}