<?php

namespace Meat\Middleware;

use Closure;
use Itm\Http\Request;
use Itm\Routing\Middleware;
use Itm\Session\CookieSession as Cookie;
use Meat\Commands\RegisterVisit as RegisterVisitCommand;

class RegisterVisit implements Middleware
{
    /**
     * @var Cookie
     */
    protected $cookie;

    public function __construct(Cookie $cookie)
    {
        $this->cookie = $cookie;
    }

    public function handle(Request $request, Closure $next)
    {
        if (! $this->cookie->has('city')) {
            return $next($request);
        }

        dispatch(
            new RegisterVisitCommand(
                $this->cookie->get('city'))
        );

        return $next($request);
    }
}
