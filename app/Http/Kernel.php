<?php

namespace App\Http;

use Itm\Http\{Request, Response};
use Itm\Contracts\Foundation\Application;
use Itm\Contracts\Http\Kernel as KernelContract;
use Itm\Routing\{Router, RouteNotFoundException};

class Kernel implements KernelContract
{
    /**
     * @var Application
     */
    protected $app;

    /**
     * @var Router
     */
    protected $router;

    public function __construct(Application $app, Router $router)
    {
        $this->app = $app;
        $this->router = $router;

        $this->app->instance('router', $router);
    }

    public function handle(Request $request): Response
    {
        $this->app->instance(Request::class, $request);

        $this->enableMethodOverride($request);

        try {
            return $this->router->dispatch($request);
        } catch (RouteNotFoundException $exception) {
            $request->menu = '404';

            return $this->handle($request);
        }
    }

    protected function enableMethodOverride(Request $request): void
    {
        if ($request->method() == 'GET' && ! $request->menu) {
            $request->menu = 'bienvenido';
        } else if ($request->method() != 'GET') {
            $request->menu = $_GET['menu'] ?? '404';
        }
    }
}
