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
    }

    public function basePath(): string
    {
        return $this->basePath;
    }
}
