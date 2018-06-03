<?php

namespace Itm\View;

use Exception;
use Itm\Contracts\View\Renderable;
use Illuminate\Contracts\Container\Container;
use Itm\Contracts\View\ViewFactory as ViewFactoryContract;

class ViewFactory implements ViewFactoryContract
{
    /**
     * @var View[]
     */
    protected $views = [];

    /**
     * @var Container
     */
    protected $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function add(View $view)
    {
        $this->views[] = $view;
    }

    public function make($name, $parameters = []): Renderable
    {
        $view = $this->getView($name);

        $view->setParameters($parameters);

        return $view;
    }

    public function register($name, $fileName): self
    {
        // TODO: Change for lazy loading to not store instances.
        $view = $this->container
            ->make('_view')
            ->name($name)
            ->to($fileName);

        $this->add($view);

        return $this;
    }

    protected function getView(string $name): View
    {
        return $this->findView($name);
    }

    protected function findView(string $name): View
    {
        foreach ($this->views as $view) {
            if ($view->hasName($name)) {
                return $view;
            }
        }

        throw new Exception("View [{$name}] not found.");
    }
}
