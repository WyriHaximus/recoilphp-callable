<?php declare(strict_types=1);

namespace WyriHaximus\Recoil;

use function WyriHaximus\React\callableWrapper;

final class CallableWrapper
{
    /** @var QueueCallerInterface */
    private $queueCaller;

    /**
     * CallableWrapper constructor.
     * @param QueueCallerInterface $queueCaller
     */
    public function __construct(QueueCallerInterface $queueCaller)
    {
        $this->queueCaller = $queueCaller;
    }

    public function callable(callable $callable): callable
    {
        return callableWrapper($this->queueCaller, $callable);
    }
}
