<?php

namespace App\Http\Controllers\Auth;

use Itm\Http\Request;
use App\Http\Controllers\Controller;
use Meat\Commands\RegisterShopKeeper;
use Meat\Repositories\StoreRepository;
use Meat\Repositories\NeighborhoodRepository;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware($this->guestWithMessage());
    }

    protected function guestWithMessage() {
        return function ($request, $next) {
            if (! auth()->check()) {
                return $next($request);
            }

            session()->set('message', 'Debes cerrar sesión para realizar esta acción.');
            session()->set('message_type', 'info');

            return redirect('?menu=403');
        };
    }

    public function showRegister(
        StoreRepository $storeRepository,
        NeighborhoodRepository $cityRepository
    )
    {
        $neighborhoods = $cityRepository->all();

        $stores = $storeRepository->all();

        return view('register', compact('neighborhoods', 'stores'));
    }

    public function register(Request $request)
    {
        $this->dispatchRegisterShopKeeper($request);

        session()->set('message', 'Tendero registrado con éxito.');
        session()->set('message_type', 'success');

        return redirect('?menu=registro');
    }

    protected function dispatchRegisterShopKeeper(Request $request): void
    {
        $command = new RegisterShopKeeper;

        $command->name = $request->name;
        $command->nit = $request->nit;
        $command->email = $request->email;
        $command->password = $request->password;
        $command->neighborhoodId = $request->neighborhood;
        $command->storeId = $request->store;
        $command->address = $request->address;
        $command->phone = $request->phone;

        dispatch($command);
    }
}
