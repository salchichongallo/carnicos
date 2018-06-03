<?php

namespace Meat\Sale;

use DateTime;
use Meat\Store\Store;
use Meat\Store\Customer;

class Sale
{
    /**
     * @var string
     */
    protected $id;

    /**
     * @var DateTime
     */
    protected $date;

    /**
     * @var Customer
     */
    protected $customer;

    /**
     * @var Store
     */
    protected $store;

    /**
     * @var SaleProduct[]
     */
    protected $products = [];

    /**
     * @var float
     */
    protected $total = 0;

    public function total()
    {
        $total = array_reduce(
            $this->products,
            $this->calcTotal(),
            0
        );

        $this->total = $total;

        return $total;
    }

    protected function calcTotal()
    {
        return function ($total, SaleProduct $product) {
            return $total + $product->total();
        };
    }

    public function add(SaleProduct $product)
    {
        if (in_array($product, $this->products)) {
            return;
        }

        $product->setSale($this);
        $product->setStore($this->store);

        $this->products[] = $product;
    }

    public function isSold()
    {
        return is_null($this->date);
    }

    /**
     * @return float
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
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
    public function setDate(DateTime $date): void
    {
        $this->date = $date;
    }

    /**
     * @return Customer
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * @param Customer $customer
     */
    public function setCustomer(Customer $customer): void
    {
        $this->customer = $customer;
    }

    /**
     * @return Store
     */
    public function getStore()
    {
        return $this->store;
    }

    /**
     * @param Store $store
     */
    public function setStore(Store $store): void
    {
        $this->store = $store;
    }

    /**
     * @return SaleProduct[]
     */
    public function getProducts()
    {
        return $this->products;
    }
}
