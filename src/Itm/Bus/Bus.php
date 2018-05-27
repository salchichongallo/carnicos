<?php

namespace Itm\Bus;

use Exception;
use Itm\Contracts\Bus\{
    Command,
    Handler,
    HandlerResolver,
    Bus as BusContract
};
use Illuminate\Contracts\Container\Container;

class Bus implements BusContract, HandlerResolver
{
    /**
     * @var Container
     */
    protected $container;

    protected $handlers = [];

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function dispatch(Command $command)
    {
        return $this->resolveHandler($command)
            ->handle($command);
    }

    public function getResolver(): HandlerResolver
    {
        return $this;
    }

    public function map($command, $handler)
    {
        $this->handlers[$command] = $handler;

        return $this;
    }

    public function resolveHandler(Command $command): Handler
    {
        $command = get_class($command);

        if (! array_key_exists($command, $this->handlers)) {
            throw new Exception("Handler not found for [{$command}}] command.");
        }

        $handler = $this->handlers[$command];

        return $this->container->make($handler);
    }

    /**
     * @return Handler[]
     */
    public function getHandlers()
    {
        return $this->handlers;
    }
}
