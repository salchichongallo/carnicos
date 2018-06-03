<?php

namespace App\Http\Controllers;

use Itm\Http\Request;
use Meat\Commands\CreateStore;
use Meat\Repositories\CityRepository;

class StoreController extends Controller
{
    public function __construct()
    {
        $this->middleware('loggedin');
        $this->middleware('role:admin');
    }

    public function create(Request $request)
    {
        $this->dispatchCreateStore($request);

        session()->set('message', 'Punto de venta creado con éxito.');
        session()->set('message_type', 'success');

        return redirect('?menu=nueva_tienda');
    }

    protected function dispatchCreateStore(Request $request): void
    {
        $createStore = new CreateStore;

        $createStore->id = $request->id;
        $createStore->name = $request->name;
        $createStore->address = $request->address;
        $createStore->cityId = $request->city;
        $createStore->phone = $request->phone;

        dispatch($createStore);
    }

    public function showCreationForm(CityRepository $cityRepository)
    {
        $cities = $cityRepository->all();

        return view('stores.create', compact('cities'));
    }
}
