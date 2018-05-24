<?php

use Itm\Http\Request;
use Itm\Routing\Router;
use Itm\Routing\RouteNotFoundException;

require_once __DIR__.'/../vendor/autoload.php';

$app = require_once __DIR__.'/../bootstrap/app.php';

$router = $app->make(Router::class);
require_once __DIR__.'/../app/routes.php';

$request = Request::capture();

if ($request->method() == 'GET' && ! $request->menu) {
    $request->menu = 'welcome';
} else if ($request->method() != 'GET') {
    $request->menu = $_GET['menu'] ?? '404';
}

function handle($router, $request)
{
    try {
        return $router->dispatch($request);
    } catch (RouteNotFoundException $exception) {
        $request->menu = '404';

        return handle($router, $request);
    }
}

handle($router, $request)->send();
