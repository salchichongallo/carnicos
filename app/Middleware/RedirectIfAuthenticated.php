<?php

namespace App\Middleware;

use Closure;
use Itm\Http\Request;
use Itm\Routing\Middleware;

class RedirectIfAuthenticated implements Middleware
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check()) {
            return redirect('?menu=bienvenido');
        }

        return $next($request);
    }
}
