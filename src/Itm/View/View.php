<?php

namespace Itm\View;

use Itm\Contracts\View\Renderable;
use Itm\Contracts\Foundation\Application;

abstract class View implements Renderable
{
    /**
     * @var Application
     */
    protected $app;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var mixed
     */
    protected $parameters = [];

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    public function render()
    {
        try {
            return $this->renderView();
        } finally {
            $this->flushParameters();
        }
    }

    abstract public function renderView();

    public function name(string $value)
    {
        $this->name = $value;

        return $this;
    }

    public function hasName(string $name): bool
    {
        return $this->name == $name;
    }

    public function setParameters(array $parameters = []): void
    {
        $this->parameters = $parameters;
    }

    public function flushParameters(): void
    {
        $this->parameters = [];
    }
}
