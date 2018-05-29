<?php

namespace App\Http\Controllers;

use Itm\Http\Request;
use Meat\Commands\RegisterClient;
use Meat\Repositories\NeighborhoodRepository;

class ClientController extends Controller
{
    public function showRegisterForm(NeighborhoodRepository $cityRepository)
    {
        $neighborhoods = $cityRepository->all();

        return view('clients.create', compact('neighborhoods'));
    }

    public function create(Request $request)
    {
        $command = new RegisterClient;

        $command->id = $request->id;
        $command->name = $request->name;
        $command->email = $request->email;
        $command->password = $request->password;
        $command->neighborhoodId = $request->neighborhood;
        $command->address = $request->address;
        $command->phone = $request->phone;

        dispatch($command);

        session()->set('message', 'Cliente registrado con éxito.');
        session()->set('message_type', 'success');

        return redirect('?menu=registrar_cliente');
    }
}
