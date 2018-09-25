<?php declare(strict_types=1);

namespace WyriHaximus\Tests\Recoil;

use ApiClients\Tools\TestUtilities\TestCase;
use React\EventLoop\Factory;
use Recoil\React\ReactKernel;
use WyriHaximus\Recoil\CallableWrapper;
use WyriHaximus\Recoil\QueueCaller;

final class CallableWrapperTest extends TestCase
{
    public function testBasic()
    {
        $loop = Factory::create();
        $kernel = ReactKernel::create($loop);

        $callableWrapper = new CallableWrapper(new QueueCaller($kernel));

        $promise = $callableWrapper->callable(function () {
            yield;

            return 13;
        })();

        $thirteen = $this->await($promise, $loop);

        self::assertSame(13, $thirteen);
    }
}
