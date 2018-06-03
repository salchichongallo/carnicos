<?php

namespace App\Middleware;

use Closure;
use Itm\Http\Request;

class CheckRole
{
    public function handle(Request $request, Closure $next, string $role)
    {
        if (! $this->checkRoles($role)) {
            return redirect('?menu=403');
        }

        return $next($request);
    }

    protected function checkRoles(string $roles)
    {
        $user = auth()->user();

        foreach (explode('|', $roles) as $role) {
            if (! $user->hasRole($role)) {
                continue;
            }

            return true;
        }

        return false;
    }
}
