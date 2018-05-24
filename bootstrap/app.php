<?php

use Itm\Foundation\Application;

$app = new Application(__DIR__.'/..');

Application::setInstance($app);

$app->instance(
    \Illuminate\Contracts\Container\Container::class,
    $app
);

$app->instance(
    \Illuminate\Container\Container::class,
    $app
);

$app->instance(
    \Itm\Contracts\Foundation\Application::class,
    $app
);

require_once __DIR__.'/views.php';
require_once __DIR__.'/database.php';
require_once __DIR__.'/repositories.php';

return $app;
