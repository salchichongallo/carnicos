<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    public function showRegister()
    {
        return view('register');
    }

    public function register()
    {
        return 'Registering, please wait...';
    }
}
