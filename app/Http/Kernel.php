<?php

namespace App\Http;

use Itm\Http\{Request, Response};
use Illuminate\Pipeline\Pipeline;
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

    protected $middleware = [
        \Meat\Middleware\RegisterVisit::class,
    ];

    public function __construct(Application $app, Router $router)
    {
        $this->app = $app;
        $this->router = $router;

        $this->app->instance('router', $router);
    }

    public function handle(Request $request): Response
    {
        try {
            $this->enableHttpMethodParameterOverride($request);

            return $this->sendRequestThroughRouter($request);
        } catch (RouteNotFoundException $exception) {
            $request->menu = '404';

            return $this->handle($request);
        }
    }

    protected function enableHttpMethodParameterOverride(Request $request): void
    {
        if ($request->method() === 'GET' && ! $request->menu) {
            $request->menu = 'bienvenido';
        } else if ($request->method() != 'GET') {
            $request->menu = $_GET['menu'] ?? '404';
        }
    }

    protected function sendRequestThroughRouter($request)
    {
        $this->app->instance(Request::class, $request);

        $pipeline = $this->app->make(Pipeline::class);

        return (new Pipeline($this->app))
            ->send($request)
            ->through($this->middleware)
            ->via('handle')
            ->then($this->dispatchToRouter());
    }

    protected function dispatchToRouter()
    {
        return function ($request) {
            $this->app->instance(Request::class, $request);

            return $this->router->dispatch($request);
        };
    }
}
