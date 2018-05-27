<?php

namespace App\Http\Controllers\Auth;

use Itm\Http\Request;
use Meat\Contracts\Auth\AuthService;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function login(AuthService $auth, Request $request)
    {
        $user = $auth->attempt($request->email, $request->password);

        return 'Please wait...'. $user->getName();
    }
}
