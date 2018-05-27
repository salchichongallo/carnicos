<?php

namespace Itm\Contracts\Bus;

interface Bus
{
    public function dispatch(Command $command);

    public function getResolver(): HandlerResolver;
}
