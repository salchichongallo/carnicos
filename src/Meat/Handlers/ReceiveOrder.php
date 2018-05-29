<?php

namespace Meat\Handlers;

use Meat\Order\Order;
use Meat\Store\SalePoint;
use Meat\Store\Warehouse;
use Itm\Contracts\Bus\Handler;
use Meat\Repositories\OrderRepository;
use Meat\Repositories\SalePointRepository;

class ReceiveOrder implements Handler
{
    /**
     * @var \Meat\Repositories\OrderRepository
     */
    protected $repository;

    /**
     * @var \Meat\Repositories\SalePointRepository
     */
    protected $salePointRepository;

    public function __construct(
        OrderRepository $repository,
        SalePointRepository $salePointRepository
    )
    {
        $this->repository = $repository;
        $this->salePointRepository = $salePointRepository;
    }

    /**
     * @param \Meat\Commands\ReceiveOrder $command
     *
     * @return mixed|void
     */
    public function handle($command)
    {
        $order = $this->getOrder($command);

        $salePoint = $this->getSalePoint($order);

        $salePoint->receiveOrder($order);

        $this->updateStock($salePoint->getWarehouse());
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

        foreach ($orderProducts as $orderProduct)
        {
            $order->add($orderProduct);
        }

        return $order;
    }

    protected function getSalePoint(Order $order): SalePoint
    {
        // The Order repository instantiates
        // SalePoint, so we just return it.
        $salePoint = $order->getSalePoint();

        $salePoint->setWarehouse(new Warehouse);

        return $salePoint;
    }

    protected function updateStock(Warehouse $warehouse)
    {
        foreach ($warehouse->getProducts() as $stockProduct)
        {
            $this->salePointRepository->addToStock($stockProduct);
        }
    }
}
