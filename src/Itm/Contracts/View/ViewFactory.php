<?php

namespace Itm\Contracts\View;

interface ViewFactory
{
    public function make($name, $parameters = []): Renderable;
}
