<?php

namespace Meat\Handlers;

use Meat\Order\Order;
use Meat\Store\Store;
use Meat\Order\OrderProduct;
use Itm\Contracts\Bus\Handler;
use Meat\Repositories\OrderRepository;
use Meat\Repositories\ProductRepository;

class MakeOrder implements Handler
{
    /**
     * @var \Meat\Repositories\OrderRepository
     */
    protected $orderRepository;

    /**
     * @var \Meat\Repositories\ProductRepository
     */
    protected $productRepository;

    public function __construct(
        OrderRepository $orderRepository,
        ProductRepository $productRepository
    )
    {
        $this->orderRepository = $orderRepository;
        $this->productRepository = $productRepository;
    }

    /**
     * @param \Meat\Commands\MakeOrder $command
     *
     * @return mixed|void
     */
    public function handle($command)
    {
        $order = $this->createOrder($command);

        $store = $this->getStore($command);

        $store->requestOrder($order);

        $this->orderRepository->add($order);
    }

    /**
     * @param \Meat\Commands\MakeOrder $command
     *
     * @return \Meat\Order\Order
     */
    protected function createOrder($command): Order
    {
        $order = new Order;

        $order->setCode($command->code);

        foreach ($this->getOrderProducts($command) as $orderProduct) {
            $order->add($orderProduct);
        }

        return $order;
    }

    /**
     * @param \Meat\Commands\MakeOrder $command
     *
     * @return OrderProduct[]
     */
    protected function getOrderProducts($command)
    {
        return collect($command->products)->map(function ($data) {
            $orderProduct = new OrderProduct;

            $orderProduct->setQuantity($data['quantity']);

            $product = $this->productRepository->find($data['id']);

            $orderProduct->setProduct($product);

            return $orderProduct;
        })->toArray();
    }

    /**
     * @param \Meat\Commands\MakeOrder $command
     *
     * @return \Meat\Store\Store
     */
    protected function getStore($command)
    {
        $store = new Store;

        $store->setId($command->store);

        return $store;
    }
}
