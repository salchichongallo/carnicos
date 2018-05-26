<?php

namespace Itm\Http;

use Itm\Contracts\View\Renderable;

class Response
{
    /**
     * @var mixed
     */
    protected $content;

    public function __construct($content = null)
    {
        $this->content = $content;
    }

    public function send()
    {
        return $this->render();
    }

    public function render()
    {
        if ($this->isRenderable()) {
            return $this->content->render();
        }

        if ($this->isContentResponse()) {
            return $this->content->send();
        }

        echo $this->content;
    }

    protected function isRenderable(): bool
    {
        return $this->content instanceof Renderable;
    }

    protected function isContentResponse(): bool
    {
        return $this->content instanceof self;
    }
}
