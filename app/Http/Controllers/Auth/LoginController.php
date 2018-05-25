<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function login()
    {
        return 'Please wait...';
    }
}
