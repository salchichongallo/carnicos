<?php

require_once __DIR__.'/../vendor/autoload.php';

$app = require_once __DIR__.'/../bootstrap/app.php';

$kernel = $app->make(\Itm\Contracts\Http\Kernel::class);

require_once __DIR__.'/../app/routes.php';

$response = $kernel->handle(
    \Itm\Http\Request::capture()
);

$response->send();
