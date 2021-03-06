<?php

namespace Test;

use stdClass;
use Styde\Container;
use PHPUnit\Framework\TestCase;

class ContainerTest extends TestCase
{
    public function test_bind_from_closure()
    {
        $container = new Container();

        $container->bind('key', fn() => 'Object');

        $this->assertSame('Object', $container->make('key'));
    }

    public function test_bind_instance()
    {
        $container = new Container();

        $stdClass = new stdClass();

        $container->instance('key',$stdClass);

        $this->assertSame($stdClass, $container->make('key'));
    }

    public function test_bind_from_class_name()
    {
        $container = new Container();

        $container->bind('key', 'Test\Foo');

        $this->assertInstanceOf('Test\Foo', $container->make('key'));
    }

}

class Foo 
{
    // public function __construct(Bar $bar)
    // {
        
    // }
}

// class Bar 
// {

// }