<?php

namespace App\Http\Controllers;

use Itm\Http\Request;
use Meat\Commands\RegisterCustomer;
use Meat\Repositories\NeighborhoodRepository;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('loggedin');
        $this->middleware('role:admin|shop keeper');
    }

    public function showRegisterForm(NeighborhoodRepository $cityRepository)
    {
        $neighborhoods = $cityRepository->all();

        return view('customers.create', compact('neighborhoods'));
    }

    public function create(Request $request)
    {
        $this->registerCustomer($request);

        session()->set('message', 'Cliente registrado con éxito.');
        session()->set('message_type', 'success');

        return redirect('?menu=registrar_cliente');
    }

    protected function registerCustomer(Request $request): void
    {
        $command = new RegisterCustomer;

        $command->id = $request->id;
        $command->name = $request->name;
        $command->email = $request->email;
        $command->password = $request->password;
        $command->neighborhoodId = $request->neighborhood;
        $command->address = $request->address;
        $command->phone = $request->phone;

        dispatch($command);
    }
}
