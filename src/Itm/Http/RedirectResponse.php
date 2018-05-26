<?php

namespace Itm\Http;

class RedirectResponse extends Response
{
    /**
     * @var string
     */
    protected $redirectTo;

    public function to(string $path)
    {
        $this->redirectTo = $path;

        return $this;
    }

    public function send()
    {
        header('Location: '. $this->redirectTo);
    }
}
