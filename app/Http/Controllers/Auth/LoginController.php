<?php

namespace App\Http\Controllers\Auth;

use Itm\Http\Request;
use Meat\Middleware\CheckAuth;
use Meat\Commands\RegisterLogin;
use Meat\Contracts\Auth\AuthService;
use App\Http\Controllers\Controller;
use Meat\Commands\UpdateLastVisitUser;
use Meat\Middleware\RedirectIfAuthenticated;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware(CheckAuth::class, [ 'only' => 'logout' ]);

        $this->middleware(RedirectIfAuthenticated::class, [ 'only' => 'showLogin' ]);
    }

    public function showLogin()
    {
        return view('login');
    }

    public function login(AuthService $auth, Request $request)
    {
        $user = $auth->attempt($request->email, $request->password);

        dispatch(new RegisterLogin($user));

        return redirect('?menu=bienvenido');
    }

    public function logout(AuthService $auth)
    {
        dispatch(new UpdateLastVisitUser($auth->user()));

        $auth->forget();

        return redirect('?menu=login');
    }
}
