<?php

namespace Itm\Contracts\Bus;

interface Handler
{
    /**
     * @param Command $command
     * @return mixed
     */
    public function handle($command);
}
