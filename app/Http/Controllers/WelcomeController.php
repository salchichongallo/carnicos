<?php

namespace App\Http\Controllers;

use Itm\Http\Request;
use Meat\Repositories\CityRepository;

class WelcomeController extends Controller
{
    public function showWelcome(CityRepository $repository)
    {
        $cities = $repository->all();

        return view('welcome', compact('cities'));
    }

    public function changeCity(Request $request)
    {
        return 'Ciudad cambiada a '. $request->city;
    }

    public function showNotFound()
    {
        return view('404');
    }
}
