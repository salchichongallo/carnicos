<?php

namespace Itm\Routing;

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

    public function run(Request $request)
    {
        return new Response(
            $this->runController()
        );
    }

    protected function runController()
    {
        return $this->controllerDispatcher()->dispatch(
            $this, $this->getController(), $this->getControllerMethod()
        );
    }

    public function getController()
    {
        if (is_string($this->controller)) {
            $this->controller = $this->container->make($this->controller);
        }

        return $this->controller;
    }

    public function gatherMiddleware()
    {
        return $this->controllerDispatcher()->getMiddleware(
            $this->getController(), $this->getControllerMethod()
        );
    }

    public function controllerDispatcher()
    {
        return new ControllerDispatcher($this->container);
    }

    protected function getControllerMethod()
    {
        return $this->action;
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
