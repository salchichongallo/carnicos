<?php

namespace Itm\Routing;

use Closure;
use Itm\Http\Request;

interface Middleware
{
    public function handle(Request $request, Closure $next);
}
