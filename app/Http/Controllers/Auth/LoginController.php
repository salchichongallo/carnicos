<?php

namespace App\Http\Controllers\Auth;

use Itm\Http\Request;
use App\Auth\AuthException;
use Meat\Commands\RegisterLogin;
use Meat\Contracts\Auth\AuthService;
use App\Http\Controllers\Controller;
use Meat\Commands\UpdateLastVisitUser;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('loggedin', [ 'only' => 'logout' ]);
        $this->middleware('guest', [ 'only' => 'showLogin' ]);
    }

    public function showLogin()
    {
        return view('login');
    }

    public function login(AuthService $auth, Request $request)
    {
        try {
            $user = $auth->attempt($request->email, $request->password);
        } catch (AuthException $exception) {
            session()->set('message', $exception->getMessage());
            session()->set('message_type', 'error');

            return redirect('?menu=login');
        }

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
