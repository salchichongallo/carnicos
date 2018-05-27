<?php

namespace Itm\Routing;

class RouteCollection
{
    /**
     * @var mixed
     */
    protected $routes = [];

    public function add(string $method, Route $route)
    {
        $this->routes[$method][] = $route;
    }

    public function find(string $method, $routeName)
    {
        // We traverse routes in LIFO mode, this
        // enables route overwriting.
        $routes = array_reverse($this->getRoutes($method));

        foreach ($routes as $route) {
            if ($routeName === $route->getName()) {
                return $route;
            }
        }
    }

    protected function getRoutes(string $method)
    {
        return $this->routes[$method];
    }
}
