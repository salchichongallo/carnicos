<?php

$app = new \Itm\Foundation\Application(__DIR__.'/..');

$app->singleton(
    \Itm\Contracts\Http\Kernel::class,
    \App\Http\Kernel::class
);

setlocale(LC_ALL, 'es_CO.UTF-8');

date_default_timezone_set('America/Bogota');

require_once __DIR__.'/env.php';
require_once __DIR__.'/views.php';
require_once __DIR__.'/database.php';
require_once __DIR__.'/services.php';
require_once __DIR__.'/repositories.php';

return $app;
