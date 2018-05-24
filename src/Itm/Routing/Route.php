<?php

namespace Itm\Routing;

use Exception;
use Itm\Http\{Request, Response};
use Illuminate\Contracts\Container\Container;

class Route
{
    use RouteDependencyResolverTrait;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $method;

    /**
     * @var string
     */
    protected $action;

    /**
     * @var string
     */
    protected $controller;

    /**
     * @var Container
     */
    protected $container;

    public function __construct($method, $name, $controller)
    {
        $this->name = $name;
        $this->method = $method;
        $this->controller = $controller;
    }

    public function dispatch(Request $request)
    {
        return new Response(
            $this->runController()
        );
    }

    protected function runController()
    {
        $instance = $this->container->make($this->controller);

        $dependencies = $this->resolveClassMethodDependencies(
            [],
            $instance,
            $this->action
        );

        return call_user_func(
            [ $instance, $this->action ],
            ...array_values($dependencies)
        );
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setContainer(Container $container): void
    {
        $this->container = $container;
    }

    public function __call($action, $parameters)
    {
        $this->action = $action;
    }
}
