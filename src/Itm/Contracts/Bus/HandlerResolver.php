<?php

namespace Itm\Contracts\Bus;

interface HandlerResolver
{
    /**
     * @param  string $command
     * @param  string $handler
     * @return mixed
     */
    public function map($command, $handler);

    public function resolveHandler(Command $command): Handler;

    /**
     * @return Handler[]
     */
    public function getHandlers();
}
