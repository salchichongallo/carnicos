<?php

namespace Meat\Handlers;

use Meat\Order\Order;
use Meat\Store\Store;
use Meat\Store\Warehouse;
use Itm\Contracts\Bus\Handler;
use Meat\Repositories\OrderRepository;
use Meat\Repositories\StoreRepository;

class ReceiveOrder implements Handler
{
    /**
     * @var \Meat\Repositories\OrderRepository
     */
    protected $repository;

    /**
     * @var \Meat\Repositories\StoreRepository
     */
    protected $storeRepository;

    public function __construct(
        OrderRepository $repository,
        StoreRepository $storeRepository
    )
    {
        $this->repository = $repository;
        $this->storeRepository = $storeRepository;
    }

    /**
     * @param \Meat\Commands\ReceiveOrder $command
     *
     * @return mixed|void
     */
    public function handle($command)
    {
        $order = $this->getOrder($command);

        $store = $this->getStore($order);

        $store->receiveOrder($order);

        $this->updateStock($store->getWarehouse());
    }

    /**
     * @param \Meat\Commands\ReceiveOrder $command
     *
     * @return Order
     */
    protected function getOrder($command): Order
    {
        $order = $this->repository->find($command->order);

        $orderProducts = $this->repository->getProducts($order);

        foreach ($orderProducts as $orderProduct) {
            $order->add($orderProduct);
        }

        return $order;
    }

    protected function getStore(Order $order): Store
    {
        // The Order repository instantiates
        // Store, so we just return it.
        $store = $order->getStore();

        $store->setWarehouse(new Warehouse);

        return $store;
    }

    protected function updateStock(Warehouse $warehouse)
    {
        foreach ($warehouse->getProducts() as $stockProduct) {
            $this->storeRepository->addToStock($stockProduct);
        }
    }
}
