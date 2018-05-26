<?php

namespace Itm\Session;

class Session extends BaseSession
{
    public function __construct($name = null)
    {
        if (! is_null($name)) {
            session_name($name);
        }

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $this->attributes = &$_SESSION;
    }

    public function destroy()
    {
        session_destroy();
    }
}
