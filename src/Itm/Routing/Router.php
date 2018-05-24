<?php

namespace Itm\Routing;

use Exception;
use Itm\Http\Request;
use Illuminate\Container\Container;

class Router
{
    /**
     * @var Container
     */
    protected $app;

    /**
     * @var RouteCollection
     */
    protected $routes;

    public function __construct(Container $app, RouteCollection $routes)
    {
        $this->app = $app;
        $this->routes = $routes;
    }

    public function dispatch(Request $request)
    {
        $route = $this->routes->find(
            $request->method(),
            $request->menu
        );

        if (is_null($route)) {
            throw new RouteNotFoundException("Route not found.");
        }

        return $route->dispatch($request);
    }

    public function get($uri, $controller)
    {
        return $this->add('GET', $uri, $controller);
    }

    public function post($uri, $controller)
    {
        return $this->add('POST', $uri, $controller);
    }

    protected function add($method, $uri, $controller)
    {
        $route = $this->createRoute($method, $uri, $controller);

        $this->routes->add($method, $route);

        return $route;
    }

    protected function createRoute($method, $uri, $controller): Route
    {
        $route = new Route($method, $uri, $controller);

        $route->setContainer($this->app);

        return $route;
    }
}
