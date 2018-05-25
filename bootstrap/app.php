<?php

$app = new \Itm\Foundation\Application(__DIR__.'/..');

$app->singleton(
    \Itm\Contracts\Http\Kernel::class,
    \App\Http\Kernel::class
);

require_once __DIR__.'/views.php';
require_once __DIR__.'/database.php';
require_once __DIR__.'/repositories.php';

return $app;
