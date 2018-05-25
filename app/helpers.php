<?php

use Itm\Foundation\Application;
use Illuminate\Support\Collection;
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

function partial(string $name, $parameters = [])
{
    return view($name, $parameters)->render();
}

function escape(string $text)
{
    return htmlspecialchars($text, ENT_COMPAT | ENT_HTML5);
}
