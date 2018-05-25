<?php

namespace Itm\Foundation;

use Illuminate\Container\Container;
use Itm\Contracts\Foundation\Application as ApplicationContract;

class Application extends Container implements ApplicationContract
{
    /**
     * @var string
     */
    protected $basePath;

    public function __construct(string $basePath)
    {
        $this->basePath = $basePath;

        $this->bindBaseProviders();
    }

    protected function bindBaseProviders(): void
    {
        Application::setInstance($this);

        $this->instance(ApplicationContract::class, $this);
        $this->instance(\Illuminate\Container\Container::class, $this);
        $this->instance(\Illuminate\Contracts\Container\Container::class, $this);
    }

    public function basePath(): string
    {
        return $this->basePath;
    }
}
