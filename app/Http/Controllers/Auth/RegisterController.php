<?php

namespace App\Http\Controllers\Auth;

use Itm\Http\Request;
use App\Http\Controllers\Controller;
use Meat\Commands\RegisterShopKeeper;
use Meat\Repositories\SalePointRepository;
use Meat\Repositories\NeighborhoodRepository;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegister(
        NeighborhoodRepository $cityRepository,
        SalePointRepository $salePointRepository
    )
    {
        $neighborhoods = $cityRepository->all();

        $salePoints = $salePointRepository->all();

        return view('register', compact('neighborhoods', 'salePoints'));
    }

    public function register(Request $request)
    {
        $command = new RegisterShopKeeper;

        $command->name = $request->name;
        $command->nit = $request->nit;
        $command->email = $request->email;
        $command->password = $request->password;
        $command->neighborhoodId = $request->neighborhood;
        $command->salePointId = $request->salepoint;
        $command->address = $request->address;
        $command->phone = $request->phone;

        dispatch($command);

        session()->set('message', 'Tendero registrado con éxito.');
        session()->set('message_type', 'success');

        return redirect('?menu=registro');
    }
}
