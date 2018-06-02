<?php

namespace App\Http\Controllers;

use Itm\Http\Request;
use Meat\Repositories\CityRepository;
use Itm\Session\CookieSession as Cookie;

class WelcomeController extends Controller
{
    public function showWelcome(Cookie $cookie, CityRepository $repository)
    {
        if ($cookie->has('city')) {
            return redirect('?menu=promociones');
        }

        $cities = $repository->all();

        return view('welcome', compact('cities'));
    }

    public function changeCity(Request $request, Cookie $cookie)
    {
        $cookie->set('city', $request->city);

        return redirect('?menu=promociones');
    }

    public function showNotFound()
    {
        return view('404');
    }

    public function showForbidden()
    {
        return view('403');
    }
}
