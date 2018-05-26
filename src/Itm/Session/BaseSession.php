<?php

namespace Itm\Session;

use ArrayAccess;
use JsonSerializable;
use Itm\Support\Traits\Fluent;
use Itm\Contracts\Session\Session;
use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Contracts\Support\Arrayable;

abstract class BaseSession implements Session, ArrayAccess, Arrayable, Jsonable, JsonSerializable
{
    use Fluent;

    public function forget($key)
    {
        $value = $this->get($key);

        $this->offsetUnset($key);

        return $value;
    }
}
