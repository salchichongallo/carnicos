<?php

namespace App\Http\Controllers;

use Meat\User;
use Itm\Http\Request;
use Meat\Commands\RegisterSale;
use Meat\Repositories\ProductRepository;

class SaleController extends Controller
{
    public function showNewSaleForm(ProductRepository $repository)
    {
        $products = $repository->all();

        return view('sales.register', compact('products'));
    }

    public function registerSale(User $user, Request $request)
    {
        $registerSale = new RegisterSale;

        $registerSale->client = $request->customer;
        $registerSale->salePoint = $request->store;

        $this->addItems($registerSale, $request->items ?? []);

        dispatch($registerSale);

        session()->set('message', 'Venta registrada con éxito.');
        session()->set('message_type', 'success');

        return redirect('?menu=registrar_venta');
    }

    protected function addItems(RegisterSale $sale, array $items): void {
        foreach ($items as $item) {
            list($code, $quantity) = explode(',', $item);
            $sale->add($code, $quantity);
        }
    }
}
