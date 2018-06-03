<?php

namespace App\Middleware;

use Closure;
use Itm\Http\Request;
use Itm\Session\Session;
use Itm\Routing\Middleware;
use Meat\Repositories\UserRepository;
use Itm\Contracts\Foundation\Application;

class AuthMiddleware implements Middleware
{
    /**
     * @var Application
     */
    protected $app;

    /**
     * @var Session
     */
    protected $session;

    /**
     * @var UserRepository
     */
    protected $repository;

    public function __construct(
        Application $app,
        Session $session,
        UserRepository $repository
    )
    {
        $this->app = $app;
        $this->session = $session;
        $this->repository = $repository;
    }

    public function handle(Request $request, Closure $next)
    {
        if (! $this->session->has('user')) {
            return $next($request);
        }

        $this->remember($this->session->user);

        return $next($request);
    }

    protected function remember($id): void
    {
        $user = $this->repository->find($id);

        $this->app->instance(get_class($user), $user);
    }
}
