<?php

namespace Itm\Session;

class CookieSession extends BaseSession
{
    protected $expiresIn = 0;

    public function __construct()
    {
        $this->attributes = &$_COOKIE;
    }

    public function expiresIn($value)
    {
        $this->expiresIn = $value;
    }

    public function set($key, $value)
    {
        setcookie($key, $value, $this->expiresIn);
    }

    public function destroy()
    {
        $deleteImmediately = time() - 3600;

        foreach (func_get_args() as $cookie) {
            $this->delete($cookie);

            setcookie($cookie, '', $deleteImmediately);
        }
    }
}
