<?php

namespace Meat\Order;

use DateTime;
use LogicException;
use Meat\Store\SalePoint;

class Order
{
    /**
     * @var string
     */
    protected $code;

    /**
     * @var DateTime
     */
    protected $date;

    /**
     * @var string
     */
    protected $state;

    /**
     * @var SalePoint
     */
    protected $salePoint;

    /**
     * @var OrderProduct[]
     */
    protected $products = [];

    public function dispatch()
    {
        if ($this->isPending()) {
            throw new LogicException("Order [{$this->code}] has been dispatched.");
        }

        $this->date = new DateTime;
        $this->state = OrderState::PENDING;
    }

    public function deliver()
    {
        if ($this->isDelivered()) {
            throw new LogicException("Order [{$this->code}] has been delivered.");
        }

        $this->state = OrderState::DELIVERED;
    }

    public function total()
    {
        return array_reduce(
            $this->products,
            $this->sumTotalProducts(),
            0
        );
    }

    protected function sumTotalProducts()
    {
        /**
         * @param float        $total
         * @param OrderProduct $product
         *
         * @return float
         */
        return function ($total, $product) {
            return $total + $product->total();
        };
    }

    public function isDelivered(): bool
    {
        return OrderState::isDelivered($this->state);
    }

    public function isPending(): bool
    {
        return OrderState::isPending($this->state);
    }

    public function add(OrderProduct $product): self
    {
        $this->products[] = $product;

        return $this;
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param string $code
     */
    public function setCode(string $code): void
    {
        $this->code = $code;
    }

    /**
     * @return DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param DateTime $date
     */
    public function setDate(DateTime $date)
    {
        $this->date = $date;
    }

    /**
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param string $state
     */
    public function setState(string $state): void
    {
        $this->state = $state;
    }

    /**
     * @return SalePoint
     */
    public function getSalePoint()
    {
        return $this->salePoint;
    }

    /**
     * @param SalePoint $salePoint
     */
    public function setSalePoint(SalePoint $salePoint): void
    {
        $this->salePoint = $salePoint;
    }

    /**
     * @return OrderProduct[]
     */
    public function getProducts()
    {
        return $this->products;
    }
}
