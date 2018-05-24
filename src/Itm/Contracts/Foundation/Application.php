<?php

namespace Itm\Contracts\Foundation;

use Illuminate\Contracts\Container\Container;

interface Application extends Container
{
    public function basePath(): string;
}
