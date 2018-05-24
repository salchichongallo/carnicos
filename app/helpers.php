<?php

use Itm\Foundation\Application;
use Itm\Contracts\View\ViewFactory;

function app($abstract = null, $parameters = [])
{
    $app = Application::getInstance();

    if (is_null($abstract)) {
        return $app;
    }

    return $app->make($abstract, $parameters);
}

function view(string $name, $parameters = [])
{
    return app(ViewFactory::class)->make($name, $parameters);
}
