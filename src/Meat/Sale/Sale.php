<?php

namespace Meat\Sale;

use DateTime;
use Meat\Store\Client;
use Meat\Store\SalePoint;

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
     * @var Client
     */
    protected $client;

    /**
     * @var SalePoint
     */
    protected $salePoint;

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
        $product->setSalePoint($this->salePoint);

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
     * @return Client
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * @param Client $client
     */
    public function setClient(Client $client): void
    {
        $this->client = $client;
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
     * @return SaleProduct[]
     */
    public function getProducts()
    {
        return $this->products;
    }
}
