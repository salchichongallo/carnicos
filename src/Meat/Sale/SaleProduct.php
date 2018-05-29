<?php

namespace Meat\Sale;

use Meat\Store\SalePoint;
use Meat\Product\Product;

class SaleProduct
{
    /**
     * @var Product
     */
    protected $product;

    /**
     * @var SalePoint
     */
    protected $salePoint;

    /**
     * @var int
     */
    protected $quantity = 0;

    /**
     * @var Sale
     */
    protected $sale;

    public function total()
    {
        return (float) ($this->quantity * $this->product->getPrice());
    }

    /**
     * @return Product
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * @param Product $product
     */
    public function setProduct(Product $product): void
    {
        $this->product = $product;
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
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param int $quantity
     */
    public function setQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
    }

    /**
     * @return Sale
     */
    public function getSale()
    {
        return $this->sale;
    }

    /**
     * @param Sale $sale
     */
    public function setSale(Sale $sale): void
    {
        $this->sale = $sale;
    }
}
