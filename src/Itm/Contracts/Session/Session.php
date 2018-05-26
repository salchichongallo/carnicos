<?php

namespace Itm\Contracts\Session;

interface Session
{
    public function destroy();

    public function forget($key);

    public function has($key): bool;

    public function set($key, $value);

    public function get($key, $default = null);
}
