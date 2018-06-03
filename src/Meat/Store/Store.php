<?php

namespace Meat\Store;

use DateTime;
use Meat\Sale\Sale;
use Meat\Order\Order;
use Meat\Street\City;
use Meat\Order\OrderProduct;

class Store
{
    /**
     * @var string
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $address;

    /**
     * @var string
     */
    protected $phone;

    /**
     * @var City
     */
    protected $city;

    /**
     * @var Warehouse
     */
    protected $warehouse;

    public function requestOrder(Order $order)
    {
        $order->setStore($this);

        $order->dispatch();
    }

    public function receiveOrder(Order $order)
    {
        $order->setStore($this);

        $order->deliver();

        $this->receiveOrderProducts($order->getProducts());
    }

    /**
     * @param OrderProduct[] $products
     */
    protected function receiveOrderProducts(array $products)
    {
        foreach ($products as $product) {
            $this->addToWarehouse($product);
        }
    }

    protected function addToWarehouse(OrderProduct $orderProduct)
    {
        $stock = new StockProduct;

        $stock->setStore($this);

        $stock->setStock($orderProduct->getQuantity());
        $stock->setProduct($orderProduct->getProduct());

        $this->warehouse->add($stock);
    }

    /**
     * @param \Meat\Sale\SaleProduct[] $products
     *
     * @return Sale
     */
    public function sell($products)
    {
        $sale = new Sale;

        $sale->setStore($this);
        $sale->setDate(new DateTime);

        foreach ($products as $product) {
            $sale->add($product);
        }

        return $sale;
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
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param string $address
     */
    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @return City
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param City $city
     */
    public function setCity(City $city): void
    {
        $this->city = $city;
    }

    /**
     * @return Warehouse
     */
    public function getWarehouse()
    {
        return $this->warehouse;
    }

    /**
     * @param Warehouse $warehouse
     */
    public function setWarehouse(Warehouse $warehouse): void
    {
        $this->warehouse = $warehouse;
    }
}
