<?php

namespace App\Http\Controllers;

use Itm\Http\Request;
use Meat\Commands\CreateSalePoint;
use Meat\Repositories\CityRepository;

class SalePointController extends Controller
{
    public function __construct()
    {
        $this->middleware('loggedin');
        $this->middleware('role:admin');
    }

    public function create(Request $request)
    {
        $createSalePoint = new CreateSalePoint;

        $createSalePoint->id = $request->id;
        $createSalePoint->name = $request->name;
        $createSalePoint->address = $request->address;
        $createSalePoint->cityId = $request->city;
        $createSalePoint->phone = $request->phone;

        dispatch($createSalePoint);

        session()->set('message', 'Punto de venta creado con éxito.');
        session()->set('message_type', 'success');

        return redirect('?menu=nueva_tienda');
    }

    public function showCreationForm(CityRepository $cityRepository)
    {
        $cities = $cityRepository->all();

        return view('create_sale_point', compact('cities'));
    }
}
