<?php

namespace Itm\Http;

use Illuminate\Support\Fluent;

class Request extends Fluent
{
    public static function capture()
    {
        $request = new self(
            $_SERVER['REQUEST_METHOD'] == 'GET' ? $_GET : $_POST
        );

        return $request;
    }

    public function has(string $parameter): bool
    {
        return $this->offsetExists($parameter);
    }

    public function method(): string
    {
        return $_SERVER['REQUEST_METHOD'];
    }
}
