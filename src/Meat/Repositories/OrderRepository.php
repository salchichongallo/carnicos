<?php

namespace Meat\Repositories;

use Meat\Order\Order;

interface OrderRepository
{
    public function add(Order $order): bool;

    public function find(string $order): Order;

    /**
     * @param Order $order
     *
     * @return \Meat\Order\OrderProduct[]
     */
    public function getProducts(Order $order);
}
