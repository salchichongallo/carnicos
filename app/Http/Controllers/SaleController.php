<?php

namespace App\Http\Controllers;

use Itm\Http\Request;
use Meat\Commands\RegisterSale;
use Meat\Repositories\ProductRepository;

class SaleController extends Controller
{
    public function __construct()
    {
        $this->middleware('loggedin');
        $this->middleware('role:shop keeper');
    }

    public function showNewSaleForm(ProductRepository $repository)
    {
        $products = $repository->all();

        return view('sales.register', compact('products'));
    }

    public function registerSale(Request $request)
    {
        $this->dispatchRegisterSale($request);

        session()->set('message', 'Venta registrada con éxito.');
        session()->set('message_type', 'success');

        return redirect('?menu=registrar_venta');
    }

    protected function dispatchRegisterSale(Request $request): void
    {
        $registerSale = new RegisterSale;

        $registerSale->customer = $request->customer;
        $registerSale->store = $request->store;

        $this->addItems($registerSale, $request->items ?? []);

        dispatch($registerSale);
    }

    protected function addItems(RegisterSale $sale, array $items): void {
        foreach ($items as $item) {
            list($code, $quantity) = explode(',', $item);
            $sale->add($code, $quantity);
        }
    }
}
