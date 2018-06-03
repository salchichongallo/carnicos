<?php

namespace App\Middleware;

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

    /**
     * Whitelist of pages to register visits.
     */
    protected $menu = [
        'registro',
        'promociones',
    ];

    public function __construct(Cookie $cookie)
    {
        $this->cookie = $cookie;
    }

    public function handle(Request $request, Closure $next)
    {
        if (! $this->cookie->has('city') || $this->shouldSkip($request)) {
            return $next($request);
        }

        dispatch(
            new RegisterVisitCommand(
                $this->cookie->get('city')
            )
        );

        return $next($request);
    }

    protected function shouldSkip($request): bool
    {
        return ! in_array($request->menu, $this->menu);
    }
}
