<?php declare(strict_types=1);

namespace WyriHaximus\React;

use React\Promise\Promise;
use WyriHaximus\Recoil\Call;
use WyriHaximus\Recoil\QueueCallerInterface;
use function ApiClients\Tools\Rx\observableFromArray;

function callableWrapper(QueueCallerInterface $queueCaller, callable $callable): callable
{
    return function (...$args) use ($queueCaller, $callable) {
        return new Promise(function ($resolve, $reject) use ($queueCaller, $callable, $args): void {
            $call = new Call($callable, ...$args);
            $call->wait($resolve, $reject);
            $queueCaller->call(observableFromArray([
                $call,
            ]));
        });
    };
}
