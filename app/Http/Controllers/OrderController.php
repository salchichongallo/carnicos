<?php

namespace App\Http\Controllers;

use Meat\User;
use Itm\Http\Request;
use Meat\Commands\MakeOrder;
use Meat\Commands\ReceiveOrder;
use Meat\Repositories\StoreRepository;
use Meat\Repositories\ProductRepository;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('loggedin');
        $this->middleware('role:shop keeper');
    }

    public function showForm(
        User $user,
        StoreRepository $storeRepository,
        ProductRepository $productRepository
    )
    {
        $store = $storeRepository->findByShopKeeper(
            $user->getId()
        );

        $products = $productRepository->all();

        return view('orders.create', compact('store', 'products'));
    }

    public function makeOrder(Request $request)
    {
        $this->dispatchNewOrder($request);

        $this->dispatchReceiveOrder($request);

        session()->set('message', 'Pedido realizado y entregado con éxito.');
        session()->set('message_type', 'success');

        return redirect('?menu=realizar_pedido');
    }

    protected function dispatchNewOrder(Request $request): void
    {
        $makeOrder = new MakeOrder;

        $makeOrder->code = $request->code;
        $makeOrder->store = $request->store;

        $this->addProducts($makeOrder, $request->products);

        dispatch($makeOrder);
    }

    protected function dispatchReceiveOrder(Request $request): void
    {
        $receiveOrder = new ReceiveOrder;

        $receiveOrder->order = $request->code;
        $receiveOrder->store = $request->store;

        dispatch($receiveOrder);
    }

    protected function addProducts(MakeOrder $order, array $products): void
    {
        foreach ($products as $product) {
            list($id, $quantity) = explode(',', $product);

            $order->add($id, $quantity);
        }
    }
}
