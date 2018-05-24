<?php

namespace App\Http\Controllers;

class WelcomeController extends Controller
{
    public function showWelcome()
    {
        return view('welcome');
    }

    public function showNotFound()
    {
        return view('404');
    }
}
